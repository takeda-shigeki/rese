# Rese（リーズ）
ある企業のグループ会社の飲食店予約サービスである。
![alt text](<トップ画面(614).png>)

## 作成の目的
社で予約サービスを持ちたい

## アプリケーションURL
http://15.152.201.189/

## 他のレポジトリ
なし

## 機能一覧
・会員登録<BR>
・メールによる本人確認<BR>
・ログイン<BR>
・ログアウト<BR>
・ユーザー飲食店お気に入り一覧取得<BR>
・ユーザー飲食店予約情報取得<BR>
・飲食店一覧取得<BR>
・飲食店をエリアで検索<BR>
・飲食店をジャンルで検索<BR>
・飲食店を店名で検索<BR>
・飲食店お気に入り追加<BR>
・飲食店お気に入り削除<BR>
・飲食店詳細取得<BR>
・飲食店予約情報追加<BR>
・飲食店予約情報削除<BR>
・飲食店予約変更<BR>
・飲食店の評価とコメント入力<BR>
・店舗代表者による店舗情報の作成、更新と予約情報の確認<BR>
・管理者による店舗代表者の作成<BR>
・店舗画像のストレージ保存<BR>
・管理者から利用者へのお知らせメール送信<BR>
・予約リマインダー送信<BR>
・Stripe決済<BR>
・レスポンシブデザイン<BR>
・AWS（ストレージ：S3　バックエンド：EC2　データベース：RDS）での環境構築<BR>

## 使用技術
PHP  7.4.9<BR>
Laravel  8.83.27<BR>
MySQL 8.0.26<BR>

## テーブル設計
![image](https://github.com/takeda-shigeki/rese/assets/132808377/8d3a3e52-e7d1-4c43-9658-70b8d9cfa298)

## ER図
![rese](https://github.com/takeda-shigeki/rese/assets/132808377/c44cbc21-b3ed-4d68-b48e-6e0618b7e6c4)

## 備考
・管理者用ページへの入り方<br>
UsersTableSeeder.phpにて、'role'が'admin'となっているユーザーの'email'と'password'にてログインする。<br>
・店舗代表者用ページへの入り方<br>
UsersTableSeeder.phpにて、'role'が'host'となっているユーザーの'email'と'password'にてログインする。<br>
・利用者用ページへの入り方<br>
UsersTableSeeder.phpにて、'role'が指定されていないユーザーの'email'と'password'にてログインする。あるいは、ご自身で新規ユーザー登録する。<br>


