<?php
return [
    'settings_title' => 'VerseLinker 設定',
    'language_label' => '言語を選択:',
    'version_label' => 'バージョンを選択:',
    'version_description' => '旧約聖書または新約聖書のみを含むバージョンを選択した場合、選択したバージョンに含まれない書物への参照はデフォルトバージョンを使用して処理されます。 
    例えば、新約聖書のみを含むバージョンを選択し、創世記 1:1（旧約聖書）を参照した場合、システムはデフォルトバージョンを使用して自動的に処理します。 
    これにより、すべての参照が正確にリンクされます。',
    'language_resolution_mode' => '言語の解決方法',
    'language_resolution_fixed' => 'すべてのページで設定済みの言語を使用',
    'language_resolution_per_page' => 'ページごとに言語を判定',
    'language_resolution_description' => '固定モードでは、上で設定した言語と聖書バージョンをすべてのページで使用します。ページごとの判定では、以下の優先順位に従います。',
    'language_resolution_how_it_works' => '言語の判定方法',
    'language_resolution_url_rule' => 'URLパスルール：パスを入力すると、一致するURLで選択した言語と聖書バージョンを使用します。',
    'language_resolution_html_language' => 'HTML言語：一致するURLルールがない場合、VerseLinkerは<html lang>を参照します。例えばja-JPはja、en-USはenとして可能な範囲で正規化されます。パスを空欄にすると、検出された言語で使用する聖書バージョンを上書きできます。空欄の設定がなければ、その言語の同梱デフォルトバージョンを使用します。',
    'language_resolution_fixed_fallback' => '固定設定へのフォールバック：どちらの方法でも対応言語を判定できない場合、上で設定した固定の言語と聖書バージョンを使用します。',
    'language_routes' => 'ページごとの言語ルール',
    'language_route_path' => 'URLパスの接頭辞（任意）',
    'language_route_path_placeholder' => '/english/ または<html lang>用は空欄',
    'language_route_language' => '言語',
    'language_route_version' => '聖書バージョン',
    'language_route_actions' => '操作',
    'language_route_remove' => '削除',
    'language_route_add' => '言語ルートを追加',
    'language_routes_description' => 'サイト相対のURLパスを入力すると明示的なURLルールになり、空欄にするとHTML言語に対応する聖書バージョンの上書き設定になります。URLルールが優先され、複数一致する場合は最も長いパスを使用します。最大20件まで追加できます。',
    'plugin_description' => 'VerseLinker プラグインの設定オプションは、ウェブサイト上で聖書の参照を自動的にリンクに変換する方法を簡単にカスタマイズできます。',
    'save_changes' => '変更を保存',
    'error_loading_languages' => '言語リストの読み込み中にエラーが発生しました。 <code>/json/idiomas.json</code> ファイルが存在し、有効であることを確認してください。',
    'complete_bible' => '完全な聖書 (TB)',
    'old_testament' => '旧約聖書のみ (AT)',
    'new_testament' => '新約聖書のみ (NT)',
    'examples_title' => 'プラグインの機能をテスト',
    'examples_description' => '以下の聖書参照にカーソルを合わせて、プラグインがどのように動作するかを確認してください。',
    'data_trueTooltip' => '聖書の参照にツールチップを有効にする。',
    'data_trueTooltip_description' => 'ここでは、聖書の参照に表示されるツールチップを有効にすることができます。ツールチップを使用すると、ページを離れることなく聖句を簡単に確認できますが、無効にするとこのプレビューは利用できなくなります。これによりインターフェースはすっきりしますが、聖句の情報が自動で読み込まれなくなり、ユーザーがリンクをクリックしたときにのみ表示されるようになります。この便利な機能を無効にする必要が本当にあるかどうかを考えてください。無効にする場合は、下のチェックボックスをオフにしてください。',
    'data_trueCredit' => 'メッセージ "Powered by Bibliatodo.com" を表示する。',
    'data_trueCredit_description' => 'ここでは、ツールチップの下部に表示されるメッセージ "Powered by Bibliatodo.com" を有効にすることができます。このメッセージは、この便利なツールをより多くの人に知ってもらうのに役立ちます。無効にするとインターフェースはすっきりしますが、表示を維持することでプロジェクトを支援し、より多くのユーザーがこのリソースを利用できるようになります。このツールの普及を助けるために、メッセージを有効にすることをお勧めします。非表示にする場合は、チェックボックスをオフにしてください。',
    'tb' => '完全な聖書',
    'solo_at' => '旧約聖書のみ',
    'solo_nt' => '新約聖書のみ',
    'example_references' => '詩で検索: ヨハネによる福音書 3:16
        章ごとに検索: 詩篇 91
        連続した章: 詩篇 91-93
        さまざまな章: 詩篇 91,94
        以下の詩: 伝道の書 11:1-7
        グループ別の詩: 伝道の書 11:1-3,10,5
        多くの本と組み合わせ: ヨハネによる福音書 1:1-4;マタイによる福音書 2:2,6-7',
    'data_trueLinks' => '既存の聖書参照URLを置き換える',
    'data_trueLinks_description' => 'このオプションを有効にすると、既存の聖書参照URLが自動的にVerseLinkerフォーマットに置き換えられます。 これにより、サイト上のすべての参照がツールチップ機能やその他の機能の恩恵を受けられるようになります。 このチェックボックスを無効にすると、VerseLinkerは既存のURLを変換しなくなり、元のリンクを保持したり、別の参照システムを使用したりすることができます。 現在のURLをそのまま保持したい場合のみ、このチェックを外してください。',
];