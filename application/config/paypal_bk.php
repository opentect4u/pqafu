<?php
/** set your paypal credential **/

$config['client_id'] = 'AdkX5VekiY6Y01t-twdtOf8mHHiL7VAnwCooYtmtIlv6TILz4AdwRG_o6eSetgTRf5_KQfn_V_WpUa2K';
$config['secret'] = 'EOx-N9qrJyaS36ZvTDOPcZ-TX1M12KNjsmEmegcqZSLbbfEN0ynlDVmlw_gX5DWXOFQiWiNat4WI6zsl';

/**
 * SDK configuration
 */
/**
 * Available option 'sandbox' or 'live'
 */
$config['settings'] = array(

    'mode' => 'sandbox',
    /**
     * Specify the max request time in seconds
     */
    'http.ConnectionTimeOut' => 1000,
    /**
     * Whether want to log to a file
     */
    'log.LogEnabled' => true,
    /**
     * Specify the file that want to write on
     */
    'log.FileName' => 'application/logs/paypal.log',
    /**
     * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
     *
     * Logging is most verbose in the 'FINE' level and decreases as you
     * proceed towards ERROR
     */
    'log.LogLevel' => 'FINE'
);

 
?>