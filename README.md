# 独習 Laravel

## 進捗記録

-   4.2.2 否定の条件分岐を表現する clear
-   Part5 clear
-   Part6.2 終了

## MySQL login

```
user: mysql -u quickusr -p -h localhost
password: password
```

MySQL ユーザーの作成と権限付与：ハンズオンガイド

1. MySQL にログイン
   まず、ターミナルまたはコマンドプロンプトを開き、root ユーザーとして MySQL にログインします。

bash
Copy code
mysql -u root -p 2. 新しいユーザーの作成
次に、新しいユーザー quickusr を作成します。この例では、パスワードを password としています。

sql
Copy code
CREATE USER 'quickusr'@'localhost' IDENTIFIED BY 'password'; 3. ユーザーに権限を付与
quickusr に quick_laravel データベースへのフルアクセス権限を付与します。

sql
Copy code
GRANT ALL PRIVILEGES ON quick_laravel.\* TO 'quickusr'@'localhost'; 4. 権限の変更を反映
権限の変更を即時反映させるために、以下のコマンドを実行します。

sql
Copy code
FLUSH PRIVILEGES; 5. データベースの選択
quick_laravel データベースを使用するためのコマンドを実行します。

sql
Copy code
USE quick_laravel; 6. テーブルの確認
データベース内のテーブルを確認するためのコマンドを実行します。

sql
Copy code
SHOW TABLES; 7. MySQL からのログアウト
すべての操作が完了したら、MySQL からログアウトします。

sql
Copy code
exit

## MySQL データのインポート方法

MySQL のエラーメッセージを見ると、2 つの主な問題が発生しているようです。

アクセス拒否エラー (ERROR 1045): ユーザー 'takeshi-arihori' がパスワードなしでローカルホストにアクセスすることが拒否されました。
データベース未選択エラー (ERROR 1046): SQL ファイルをインポートしようとしたときに、どのデータベースにインポートするかが指定されていませんでした。
以下の手順で問題を解決してみましょう：

1. アクセス拒否エラーの解決
   まず、正しいユーザー名とパスワードを使用して MySQL にログインできるか確認してください。

bash
Copy code
mysql -u takeshi-arihori -p
上記のコマンドを実行すると、パスワードの入力を求められます。正しいパスワードを入力してください。

2. データベース未選択エラーの解決
   SQL ファイルをインポートする前に、どのデータベースにインポートするかを指定する必要があります。以下の手順でデータベースを選択してからインポートしてみてください。

MySQL にログインします。
bash
Copy code
mysql -u takeshi-arihori -p
インポートしたいデータベースを選択します。例えば、mydatabase という名前のデータベースにインポートする場合：
sql
Copy code
USE mydatabase;
ログアウトして、コマンドラインから SQL ファイルをインポートします。
bash
Copy code
mysql -u takeshi-arihori -p mydatabase < quick.sql
これで、quick.sql ファイルが mydatabase データベースにインポートされるはずです。
# laravel-tutorial
