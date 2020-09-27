#**ITY**
LARAVEL8 前后端分离 JWT RBAC WEBSOCKET ActivityLog 异常记录 LOG日志 文件管理 队列 消息通知
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
2. LINUX: ` php artisan workerman start --d `
3. URI: ` ws://IP:2346?lang=LANG&token=TOKEN `
4. SEND: ` {"route": "route.name", "data": data} `

## 部署
1. APP_ENV=production
2. APP_DEBUG=false
3. REDIS_CLIENT=phpredis (可选)
4. `composer install --optimize-autoloader --no-dev` 自动加载器改进
5. `php artisan config:cache` 优化配置加载
6. `php artisan route:cache` 优化路由加载
7. `composer dump-autoload --optimize` 优化自动加载
8. `php artisan activitylog:clean --days=7` 清理操作日志
9. `php artisan exceptionerror:clean --days=7` 清理异常日志
## 维护
1.  `php artisan down` 维护模式
    1.  `php artisan down --secret="1630542a-246b-4b66-afa1-dd72a4c43515"` 指定维护模式的绕过令牌
    2. 访问 `https://example.com/1630542a-246b-4b66-afa1-dd72a4c43515`
2. `php artisan up` 关闭维护模式

## TODO
