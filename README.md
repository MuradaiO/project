# project

projectファイルの説明
人材派遣会社のコーポレートサイト兼、メンバー、案件管理サイト（使用例　お花業界）

# requirement

MAMP環境で作成しました
テンプレートエンジン　twig 
データベース mySQL
-- Server version: 5.7.26
-- PHP Version: 7.4.2

# Instlation

twigのインストール
vender.zipの解答もしくは、

　composer.json(添付ファイル)
C:\xampp\htdocs\project配下に保存(格納)してください。
Macの方は、Applications/MAMP/htdocs/project配下。


●ライブラリのインストール
コマンドラインなら、cd Application\htdocs\project
「composer install」と打ちます。


データベースの構築
database_create.txt データベース構築に関わるSQL文をご使用ください。

メール設定
mail.class.php のprivate sttatic $to = ''に値を入れることでメール受信者を設定できます



# index
管理者ユーザー: admin@gmail.com パスワード:password
一般ユーザー: member@gmail.com パスワード:password2

// データベース
database_create.txt データベース構築に関わるSQL文

// プログラム (/Application/MAMP/htdocs/project/php)

Bootstrap.class.php 設定に関するプログラム
data.php テンプレート指定、インスタンス作成に関するプログラム

add_item.php 案件追加のページを表示するプログラム
board.php 掲示板に関するプログラム

cart.php カートを表示するプログラム
confirm.php エラーチェック、確認ページ、戻る、ログイン対応のプログラムファイル

detail.php 案件詳細を表示するプログラム
enttry_list.php 応募した、された求人を表示し、採用か不採用かを決定するプログラム

regist.php 登録ページを表示するプログラム
list.php 案件一覧を表示するプログラム
detail.php 案件詳細を表示するプログラム

logout.php ログアウト処理を行うプログラム
cart.php カートを表示するプログラム
home.php トップページを表示するプログラム
f-repo.php 勤怠報告ページを表示するプログラム



mail.php メールのエラーチェック、送信対応のプログラムファイル
confirm.php エラーチェック、確認ページ、戻る、ログイン対応のプログラムファイル
postcode_search.php 郵便番号を元に、DBから住所を取得するプログラムファイル



// クラスファイル (/Application/MAMP/htdocs/project/php/lib)

PDODatabas.class.php データベース関係のクラスファイル
Session.class.php セッション関係のクラスファイル
Cart.class.php カートに関するプログラムのファイル
Item.class.php 商品に関するプログラムのクラスファイル
Common.class.php エラーチェックなどに使う、共通関数を格納したクラスファイル
Mail.class.php メールに関するプログラムのクラスファイル

// マスター読み込みファイル (/Application/MAMP/htdocs/project/php/master)
initMaster.class.php 日付や各選択肢などを設定するファイル

// テンプレート(/Application/MAMP/htdocs/project/template/project)
add_item.html.twig 案件追加のページ
board.html.twig 掲示板のページ
cart.html.twig カートページ
category_menu.html.twig カテゴリーリストの部分テンプレート
contact-form.html.twig　問い合わせページ
confirm.html.twig 確認ページ
detail.html.twig 商品詳細ページ
entry_list_admin.html.twig 応募された案件の確認ページ
entry_list.html.twig 応募した案件の確認ページ

f-repo.html.twig 勤怠送信に関わるページ
home.html.twig ホーム画面のページ
list.html.twig 案件リストページ
login.html.twig ログインページ
logout.html.twig ログアウトページ

member_list.html.twig　メンバー表を確認するページ
member_detail.html.twig メンバー詳細のページ
member_update.html.twig メンバー設定を更新するページ

personal.html.twig 性格診断のページ
regist.html.twig 登録ページ




// Javascript (/Application/MAMP/htdocs/project/js)
shopping.js クリック先へ遷移するためのjavascriptページ
common.js 郵便番号の自動入力に確認ダイアログを作成するページ


// スタイルシート (/Application/MAMP/htdocs/project/css)
stylesheet.css トップページほか、全体に関するCSS
responsive.css タブレット、スマホ等、小さい画面に対応させるCSS
work-page.css 会員専用ページのCSS


// ログのファイル
logs
