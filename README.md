#**ITY**
## API文档
API文档 [https://docs.apipost.cn/view/27e22c203e0d4854](https://docs.apipost.cn/view/27e22c203e0d4854)

## About
1. ` composer install `
2. ` cp .env.example .env `
3. ` php artisan key:generate `
4. ` php artisan jwt:secret `
5. ` php artisan migrate`
6. ` php artisan db:seed `
7. ` php artisan storage:link ` (符号连接)
8. ` php artisan ide-helper:generate ` (为 Facades 生成注释)
9. ` php artisan ide-helper:models ` (为数据模型生成注释)
10. ` php artisan ide-helper:meta ` (生成 PhpStorm Meta file)

## WebSocket
1. WINDOWS: ` start_for_win.bat `
2. LINUX: ` php artisan workerman linux --start=all -d `
3. URI: ` ws://IP:2346?lang=LANG&token=TOKEN `
4. SEND: ` {"route": "route.name", "data": data} `

## 部署
1. APP_ENV=production
2. APP_DEBUG=false
3. REDIS_CLIENT=phpredis (可选)
4. `composer install --optimize-autoloader --no-dev` 自动加载器改进
5. `php artisan config:cache` 优化配置加载
6. `php artisan route:cache` 优化路由加载
7. `php artisan optimize` 优化，生成编译文件
8. `composer dump-autoload --optimize` 优化自动加载
9. `php artisan activitylog:clean --days=7` 清理操作日志

## 维护
1.  `php artisan down --message="系统维护中"` 维护模式
2.  `php artisan down --message="系统维护中" --allow=i.p.v.4` 维护模式 指定IP可以访问
3. `php artisan up` 关闭维护模式

## TODO
1. WEBSOCKET测试
2. 系统配置表
