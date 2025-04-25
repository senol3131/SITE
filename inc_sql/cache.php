<?PHP
$dbo->doquery('SELECT TOP 1 cache_mode,cache_time FROM _Odestashield_Site');
$cache_mode = $dbo->result('cache_mode');
$cache_time = $dbo->result('cache_time');
?>