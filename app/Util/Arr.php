<?php


namespace App\Util;


use App\Models\Admin;
use Illuminate\Auth\Authenticatable;

class Arr
{
    /**
     * 获取树形结构
     * @param array $data
     * @param int $increment
     * @param string $id
     * @param string $pid
     * @param string $nodes
     * @return array
     */
    public static function getTree
    (array $data, int $increment = 0,
     string $id = 'id', string $pid = 'pid', string $nodes = 'children'): array
    {
        $ret = [];
        foreach ($data as $key => $value) {
            if ($value[$pid] === $increment) {
                $value[$nodes] = self::getTree($data, $value['id'], $id, $pid, $nodes);
                $ret[] = $value;
            }
        }
        return $ret;
    }

    /**
     * 二维数组根据指定KEY排序
     * @param array $array
     * @param string $key
     * @param int $sort
     * @return array
     */
    public static function arraySort(array $array, string $key, int $sort = SORT_DESC): array
    {
        $return = [];
        foreach ($array as $k => $v) {
            $return[$k] = $v[$key];
        }
        array_multisort($return, $sort, $array);
        return $array;
    }

    /**
     * 格式化路由
     *
     * @param array $array
     * @return array
     */
    public static function formatRoutes(array $array): array
    {
        $ret = [];
        foreach ($array as $key => $value) {
            $info = [];
            $info['id'] = $value['id'];
            $info['pid'] = $value['pid'];
            $info['path'] = $value['path'];
            $info['component'] = $value['component'];
            $info['name'] = $value['name']; // 设定路由的名字，一定要填写不然使用<keep-alive>时会出现各种问题
            $roles = [];
            if (isset($value['pivots'])) {
                foreach ($value['pivots'] as $pivot) {
                    $roles[] = $pivot['role_id'];
                }
            }
            $info['meta'] = [
                'title' => $value['name'], // 设置该路由在侧边栏和面包屑中展示的名字
                'icon' => $value['icon'], // 设置该路由的图标，支持 svg-class，也支持 el-icon-x element-ui 的 icon
                // 设置该路由进入的权限，支持多个权限叠加
                'roles' => $roles,
                'noCache' => true, // 如果设置为true，则不会被 <keep-alive> 缓存(默认 false)
                'breadcrumb' => true, //  如果设置为false，则不会在breadcrumb面包屑中显示(默认 true)
                'affix' => false, // 若果设置为true，它则会固定在tags-view中(默认 false)
            ];
            // 当设置 true 的时候该路由不会在侧边栏出现 如401，login等页面，或者如一些编辑页面/edit/1
            $info['hidden'] = $value['hidden'] ? true : false;
            // 当设置 noRedirect 的时候该路由在面包屑导航中不可被点击
            if ($value['component'] === 'layout/Layout' || $value['component'] === 'rview') $info['redirect'] = 'noRedirect';
            $ret[] = $info;
        }
        return $ret;
    }

    /**
     * 格式化路由 单层级
     *
     * @param array $menu
     * @return array
     */
    public static function formatRoutesChildren(array $menu) : array
    {
        foreach ($menu as $key => $value) {
            if ($value['pid'] === 0 && $value['component'] !== 'layout/Layout' && $value['hidden'] === false) {
                $component = $value['component'];
                $menu[$key]['component'] = 'layout/Layout';
                $menu[$key]['redirect'] = 'noRedirect';
                $menu[$key]['meta']['breadcrumb'] = false;
                $menu[$key]['children'][] = [
                    'path' => 'index',
                    'component' => $component,
                    'name' => $value['name'],
                    'hidden' => $value['hidden'],
                    'meta' => [
                        'title' => $value['meta']['title'],
                        'icon' => $value['meta']['icon'],
                        'roles' => $value['meta']['roles'],
                        'noCache' => true,
                        'breadcrumb' => true,
                        'affix' => false,
                    ]
                ];
                unset($menu[$key]['name']);
            }
        }

        return $menu;
    }
}
