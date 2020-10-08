<?php
  global $youtube_items;
  global $youtube_size;
  $youtube_size = ($youtube_size) ? $youtube_size : 5;
  global $youtube_chace_time;
  $youtube_chace_time = ($youtube_chace_time) ? $youtube_chace_time : 180;
  //キャッシュデータ設定
  require_once 'Cache/Lite.php';
  $cacheOptions = array (
    'cacheDir' => __DIR__ . '/tmp/',
//    'lifeTime' => '900',//秒
    'lifeTime' => $youtube_chace_time, //秒
    "automaticCleaningFactor" => "100",
  );
  $objCache = new Cache_Lite($cacheOptions);
  $cacheId = 'channel_list'.$youtube_size;
  
  // キャッシュがあればキャッシュからデータを取得
  if ($cache = $objCache->get($cacheId)) {
    $youtube_items = $cache;
  }
  else{
    set_include_path(__DIR__);
    require_once 'Google/Client.php';
    require_once 'Google/Service/YouTube.php';
  
    /*
     * Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
     * Google Developers Console <https://cloud.google.com/console>
     * Please ensure that you have enabled the YouTube Data API for your project.
     */
    $DEVELOPER_KEY = 'AIzaSyC7f9k2WqKEZEaVzGRyObJ_hRSBNscUZ9o';
    
    /* チャンネルID */
    $CHANNEL_ID = "UCWV3obpZVGgJ3j9FVhEjF2Q";
    
    $client = new Google_Client();
    $client->setDeveloperKey($DEVELOPER_KEY);
  
    // Define an object that will be used to make all API requests.
    $youtube = new Google_Service_YouTube($client);
  
    try {
      // Call the search.list method to retrieve results matching the specified
      // query term.
      $searchResponse = $youtube->search->listSearch(
                                                  'id,snippet',
                                                  array(
                                                      'channelId' => $CHANNEL_ID,
                                                      'order' => 'date',
                                                      'maxResults' => $youtube_size,
                                                      )
                                                  );
      $videos = '';
      $channels = '';
      $playlists = '';
  /*
      // Add each result to the appropriate list, and then display the lists of
      // matching videos, channels, and playlists.
      foreach ($searchResponse['items'] as $searchResult) {
        switch ($searchResult['id']['kind']) {
          case 'youtube#video':
            $videos .= sprintf('<li>%s (%s)</li>',
                $searchResult['snippet']['title'], $searchResult['id']['videoId']);
            break;
          case 'youtube#channel':
            $channels .= sprintf('<li>%s (%s)</li>',
                $searchResult['snippet']['title'], $searchResult['id']['channelId']);
            break;
          case 'youtube#playlist':
            $playlists .= sprintf('<li>%s (%s)</li>',
                $searchResult['snippet']['title'], $searchResult['id']['playlistId']);
            break;
        }
      }
  
      $htmlBody .= <<<END
      <h3>Videos</h3>
      <ul>$videos</ul>
      <h3>Channels</h3>
      <ul>$channels</ul>
      <h3>Playlists</h3>
      <ul>$playlists</ul>
  END;
  */
  
      $youtube_items=array();
      // パースに失敗した時は処理終了
      if ($searchResponse !== NULL) {
        foreach ($searchResponse['items'] as $searchResult) {
          switch ($searchResult['id']['kind']) {
          case 'youtube#video':
            $youtube_items[]=$searchResult['id']['videoId'];
            break;
          }
        }
      }
      $objCache->save($youtube_items,$cacheId);
//      print_r('get_data.');
    } catch (Google_ServiceException $e) {
      $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
        htmlspecialchars($e->getMessage()));
    } catch (Google_Exception $e) {
      $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
        htmlspecialchars($e->getMessage()));
    }
  }