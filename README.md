## About
1. ` composer install `
2. ` cp .env.example .env `
3. ` php artisan key:generate `
4. ` php artisan jwt:secret `
6. ` php artisan migrate`
7. ` php artisan storage:link ` (符号连接)
还有help-idea

1. APP_ENV=production
2. APP_DEBUG=false
6. REDIS_CLIENT=phpredis (可选)
3. 自动加载器改进:composer install --optimize-autoloader --no-dev
4. 优化配置加载:php artisan config:cache
5. 优化路由加载:php artisan route:cache
