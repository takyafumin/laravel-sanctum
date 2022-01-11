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
docker-compose exec laravel composer install

# アプリケーションキー生成
# DBマイグレーション
docker-compose exec laravel php artisan key:generate
docker-compose exec laravel php artisan migrate
docker-compose exec laravel php artisan db:seed
```
