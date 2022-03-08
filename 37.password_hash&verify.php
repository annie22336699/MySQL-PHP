<?php
// 使用密碼隨機編碼(每次重整都長不一樣)
echo password_hash('123456', PASSWORD_DEFAULT );
echo '<br>';
echo password_hash('123456', PASSWORD_DEFAULT );
echo '<br>';
echo password_hash('123456', PASSWORD_DEFAULT );
echo '<br>';

/*
$2y$10$XaAIBJoOUedQG6P65jcxSev3SfTUdWcv1HfopwzWAq.5H8priTGUG
$2y$10$L6CmraEXsjsCtgXMbUsYTugcjXUK7SDAudx3Y8vD/cotAbsPweHEy
$2y$10$ggwSIHl5TbWRlwfKC3oAlOb1E74Dp.FA5hTxsGVSzCuehUmuV5Pj.
*/
$hash = '$2y$10$XaAIBJoOUedQG6P65jcxSev3SfTUdWcv1HfopwzWAq.5H8priTGUG';

// 使用上面回傳的編碼比對新的密碼編碼
echo password_verify('123456', $hash) ? 'yes' : 'no';


echo '<br>';

echo password_hash('123210', PASSWORD_DEFAULT );