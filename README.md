Laravel Sanctum によるAPI認証
====================



構成
----------

| コンテナ |                用途                 |
| -------- | ----------------------------------- |
| laravel  | APP(Laravel実行)                    |
| mysql    | DB                                  |
| redis    | セッションストレージ                |
| mailhog  | メールサーバ＆Webメールクライアント |
| adminer  | DBツール                            |


機能
----------

|         機能          |          URL           |
| --------------------- | ---------------------- |
| アプリケーション      | http://localhost/      |
| Webメールクライアント | http://localhost:8025/ |
| DBツール              | http://localhost:8080/ |


使い方
----------

初回構築

```bash
# .envファイル作成(docker)
cp .env.example .env

# .envファイル作成(laravel)
cp backend/.env.example backend/.env

# dockerコンテナ起動
docker-compose up -d

# composer install
# npm install
docker-compose exec -u sail laravel composer install
docker-compose exec -u sail laravel npm ci

# アプリケーションキー生成
# DBマイグレーション
docker-compose exec -u sail laravel php artisan key:generate
docker-compose exec -u sail laravel php artisan migrate
docker-compose exec -u sail laravel php artisan db:seed

# 権限付与
docker-compose exec laravel chmod -R 770 storage bootstrap/cache
```

アセットコンパイル

```bash
# 開発用
docker-compose exec -u sail laravel npm run dev
docker-compose exec -u sail laravel npm run watch

# 本番用
docker-compose exec -u sail laravel npm run prod
```
