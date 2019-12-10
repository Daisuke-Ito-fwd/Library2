<h2>アカウント登録が完了しました。</h2>

<p>書籍管理システムのアカウント登録が完了しました。</p>
<p>このメールは大切に保管してください。</p>

<p>氏名: {{ $userMail[0]['name2'] }} {{ $userMail[0]['name1']}}</p>
<p>フリガナ: {{ $userMail[0]['kana2'] }} {{ $userMail[0]['kana1'] }} </p>
<p>メールアドレス: {{ $userMail[0]['email'] }} </p>
@if($userMail[0]['typ'] == 1)
<p>アカウント種別: 管理</p>
@else
<p>アカウント種別: 一般</p>
@endif
