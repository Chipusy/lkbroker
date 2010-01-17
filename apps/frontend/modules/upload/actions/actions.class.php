<?php

class uploadActions extends sfActions
{
	const ERROR_UPLOADING = 1;
	const ERROR_MIME = 2;
	
	public function executeImage(sfWebRequest $request)
	{
		$this->media_url = $request->getParameter('media_url', null);
		
		if(!is_null($this->media_url))
		{
			$this->media_url = base64_decode($this->media_url);
		};
		
		$this->error = $request->getParameter('error', null);
	}
	
	public function executeDo(sfWebRequest $request)
	{
		$file = $request->getFiles('upload_file');
		
		$fname = md5(time());
		$picture = '/uploads/'.$fname.'.jpg';
		
		if (move_uploaded_file($file['tmp_name'], sfConfig::get('upload_dir').'/tmp/'.$fname.'.jpg'))
		{
			list($width, $height, $type, $attr) = getimagesize(sfConfig::get('upload_dir').'/tmp/'.$fname.'.jpg');
			
			if($width>sfConfig::get('image_width'))
			{
				$thumbnail = new sfThumbnail(sfConfig::get('image_width'));
				$thumbnail->loadFile (sfConfig::get('upload_dir').'/tmp/'.$fname.'.jpg');
				$thumbnail->save (sfConfig::get('upload_dir').'/'.$fname.'.jpg');
			}
			else
			{
			    copy(sfConfig::get('upload_dir').'/tmp/'.$fname.'.jpg', sfConfig::get('upload_dir').'/'.$fname.'.jpg');
			}
		}
		
		if(!in_array($picture, array(self::ERROR_UPLOADING, self::ERROR_MIME)))
		{
			$this->redirect = 'upload/image?media_url='.base64_encode(strval($picture));
		}
		else
		{
			$this->redirect = 'upload/image?error='.$picture;
		}
	}
}
