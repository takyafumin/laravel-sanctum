Laravel Sanctum によるAPI認証
====================

Formログインした情報をsanctumを利用してAPIでも参照できるか


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

### エンドポイント

|          機能          |                 URL                  | 認証制限 |                  備考                  |
| ---------------------- | ------------------------------------ | :------: | -------------------------------------- |
| TOP画面                | http://localhost/                    |   なし   |                                        |
| ログイン画面           | http://localhost/login               |   なし   |                                        |
| ログアウト画面         | http://localhost/logout              |   あり   |                                        |
| ユーザ登録画面         | http://localhost/register            |   なし   |                                        |
| パスワードリセット画面 | http://localhost/password/reset      |   なし   |                                        |
| ホーム画面             | http://localhost/home                |   あり   |                                        |
| 検証用画面             | http://localhost/me                  |   なし   | 取得ボタンにてログイン情報を取得できる |
| ユーザ一覧API          | http://localhost/api/users           |   なし   |                                        |
| ユーザ情報API          | http://localhost/api/me              |   あり   |                                        |
| csrfトークン生成API    | http://localhost/sanctum/csrf-cookie |   あり   |                                        |


### javascriptでのajax通信例

ブラウザのconsoleから実行可能

```javascript
var xhr = new XMLHttpRequest(); xhr.open('GET', 'http://localhost/api/me'); xhr.send(); xhr.addEventListener('readystatechange', () => { if(xhr.readyState === 4 && xhr.status === 200) { console.log(JSON.parse(xhr.response)); }});
```

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
