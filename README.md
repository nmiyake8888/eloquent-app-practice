# eloquent-app-practice

## 概要
COACHTECH 教材 Tutorial 9-4「Eloquent ORM ハンズオン演習」で作成した成果物です。
LaravelのEloquent ORMを使用して、投稿の一覧表示・新規作成・編集・削除ができるシンプルなブログ投稿管理アプリケーションを作成しました。

## 使用技術
- PHP 8.2
- Laravel 10.x
- Eloquent ORM
- MySQL
- Laravel Sail
- Docker
- Blade

## 学んだこと
- Eloquent ORMを使用したデータベース操作（create・find・update・delete）と、モデルを通じたCRUD処理の実装方法
- $fillableによる一括代入可能な属性の指定と、$castsによるデータ型の変換方法
- コントローラー・ルーティング・Bladeテンプレートを連携させた、データの取得・登録・更新・削除の実装方法

## 動作確認
### 1. プロジェクトの起動
```bash
cd ~/laravel-practice/9-4-9_hands-on/eloquent-app-practice
./vendor/bin/sail up -d
```

### 2. データベースのマイグレーション
```bash
./vendor/bin/sail artisan migrate
```

### 3. テストデータの作成
```bash
./vendor/bin/sail artisan tinker
```

Tinker上で以下を実行します。

```php
use App\Models\Post;

Post::create([
    'title' => 'はじめての投稿',
    'content' => 'これはテスト投稿です。',
    'published_at' => now(),
]);
```

```php
exit
```

### 4. ブラウザで動作確認
`http://localhost/posts` にアクセスし、以下の操作を確認します。

- 投稿一覧が表示されること
- 新規作成画面から投稿を追加できること
- 編集画面から投稿を更新できること
- 削除ボタンから投稿を削除できること

### 5. Sailの停止
```bash
./vendor/bin/sail down
```