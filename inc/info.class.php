<?php

require 'db.class.php';
require'getid3/getid3.php';
require 's3/sdk.class.php';

class info
{
	
	private $dir;
	private $limit = 50;
    private $list;
	
	// public function __construct($dir)
	// {
		// $this->dir = $dir;
	// }
	
	public function getAlbum($dir)
	{
		
		$raw = scandir($dir);
		
		$list = array_diff($raw, array('..','.','thumbs.db','desktop.ini'));
		
	    foreach($list as $album){
		    echo '<div class="four columns">';
		    echo '<img class="art" src="cover.php?filename='.$dir.'/'.$album.'"/>';#
		    echo '</div>';
		}
		
	}
    
    private function getFiles($dir)
    {
        $list = scandir($dir);
    }
	
	public function shorten($string, $limit = 50)
	{
		if(strlen($string) > $limit){
			$string = wordwrap($string, $limit);
		}
	}

	public function getList($d)
	{

        $getID3 = new getID3;
		
		$DirectoryToScan = $d; 
		$dir = opendir($DirectoryToScan);
		echo '<table class="table table-striped table-bordered" id="songsList"';
		echo '<tr><th>Title</th><th class="table-cell">Artist</th><th class="table-cell">Album</th><th>Duration</th></tr>';
		while (($file = readdir($dir)) !== false) {
			$FullFileName = realpath($DirectoryToScan.'/'.$file);
			if ((substr($FullFileName, 0, 1) != '.') && is_file($FullFileName)) {
				set_time_limit(30);
		
				$ThisFileInfo = $getID3->analyze($FullFileName);
		
				getid3_lib::CopyTagsToComments($ThisFileInfo);
				
				echo '<tr>';
				echo '<td><span class="visible-phone"><img class="thumb" src="cover.php?filename='.$d.$file.'"></span><a class="songs" href="'.$d.$file.'">'.(!empty($ThisFileInfo['comments_html']['title'])  ? implode('<br>', $ThisFileInfo['comments_html']['title'])  : '&nbsp;').'</a><br/>';
                echo '<span class="visible-phone">'.(!empty($ThisFileInfo['comments_html']['artist']) ? implode('<br>', $ThisFileInfo['comments_html']['artist']) : '&nbsp;').'</span></td>';
				echo '<td class="table-cell">'.(!empty($ThisFileInfo['comments_html']['artist']) ? implode('<br>', $ThisFileInfo['comments_html']['artist']) : '&nbsp;').'</td>';
				echo '<td class="table-cell">'.(!empty($ThisFileInfo['comments_html']['album'])  ? implode('<br>', $ThisFileInfo['comments_html']['album'])  : '&nbsp;').'</td>';
                echo '<td align="right">'.(!empty($ThisFileInfo['playtime_string']) ? $ThisFileInfo['playtime_string']: '&nbsp;').'</td>';			
				echo '</tr>';
		
				}
		}
		echo '</table>';
	}

    public function processFiles($d, $u)
    {
            
        $getID3 = new getID3;
        $dirScan = $d;
        $dir = opendir($dirScan);
        while (($file = readdir($dir)) !== FALSE) {
            $fullname = realpath($dirScan . '/'.$file);
            if((substr($fullname, 0, 1) != '.') && is_file($fullname)){
                $fileinfo = $getID3->analyze($fullname);
                getid3_lib::CopyTagsToComments($fileinfo);
                
                $song = mysql_real_escape_string($fileinfo['comments_html']['title'][0]);
                $artist = mysql_real_escape_string($fileinfo['comments_html']['artist'][0]);
                $album = mysql_real_escape_string($fileinfo['comments_html']['album'][0]);
                $duration = $fileinfo['playtime_string'];
                $filename = $file;
                $id = $u;
                
                $result = mysql_query("INSERT into songs (song, artist, album, runtime, filename, user_id)
                                        VALUES('{$song}', '{$artist}', '{$album}', '{$duration}', '{$filename}', '{$id}')");
                if($result){
                    //unlink($fullname);
                    echo 'Completed.';
                }else{
                    echo mysql_error();
                }
            }
        }
        closedir($dir);
    }
	
	private function createBucket($u){
	    
        $s3 = new AmazonS3();
        $bucket = 'musica-user-store-'. md5($u);
        $response = $s3->create_bucket($bucket, $s3::REGION_EU_W1);
		print_r($response);
		return $bucket;
	}

    public function createFiles($d, $u)
    {
        $s3 = new AmazonS3();      
		$this->createBucket($u);
		$bucket = 'musica-user-store-'.md5($u);
        $dirScan = $d;
         $dirhandle = opendir($dirScan);
         $i = 0;
        while(($file = readdir($dirhandle)) !== FALSE){
            $fullname = realpath($dirScan. '/' .$file);
            if((substr($fullname, 0, 1) != '.') && is_file($fullname)){
                echo $file. '<br/>';
                $options = array(
                    'fileUpload' => 'uploads/'.$u.'/'.$file,
                    'acl' => $s3::ACL_PRIVATE
                );
                $response[$i] = $s3->create_object($bucket, $u.'/'.$file, $options);
                $i++;
                
            }
        }
        print_r($response);
    }
		
	public function albumView($dir)
	{
	
		$dirContents = scandir($dir);
		
		$list = array_diff($dirContents, array('..','.','thumbs.db','desktop.ini'));
			
			foreach ($list as $file) {
				
				$id3 = new getID3;
				
				$info = $id3->analyze($file);
				$id3->option_tag_id3v2 = true;
				
				getid3_lib::CopyTagsToComments($info);
				
				$art = $info['tags']['id3v2']['title'][0] . ".jpg";
				
				file_put_contents($art, $info['id3v2']['APIC'][0]['data']);
				
			}
	
	}
	
	public function deleteEverything($dir)
	{
		foreach (glob($dir .'/*') as $file){
			if(is_dir($file)){
			    rmdir($file);
			}else{
			    unlink($file);
			}
		}
		rmdir($file);
	}
	
}

?>