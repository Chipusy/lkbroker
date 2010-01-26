<?php


/**
 * Skeleton subclass for representing a row from the 'element_file' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Tue Jan 26 13:37:07 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class ElementFile extends BaseElementFile {

	public function save(PropelPDO $con = null, $value = null)
	{
		if ($this->getFileType() == 1)
		{
			if (!file_exists(sfConfig::get('upload_dir').'/original'))
			{
				mkdir(sfConfig::get('upload_dir').'/original', 0777);
			}
			
			move_uploaded_file($value['tmp_name'], sfConfig::get('upload_dir').'/original/'.$this->getName());
			
			if ($value)
			{
				list($width, $height) = getimagesize(sfConfig::get('upload_dir').'/original/'.$this->getName());
				
				foreach (sfConfig::get('images_format') as $format) 
				{
					@list($new_width, $new_height) = explode('x', $format);
					
					if ($width > $new_width)
					{
						if (!file_exists(sfConfig::get('upload_dir').'/'.$format))
						{
							mkdir(sfConfig::get('upload_dir').'/'.$format, 0777);
						}
						
						if (isset($new_height))
						{
							$thumbnail = new sfThumbnail($new_width, $new_height, false, false, 75, 'sfImageMagickAdapter', array('method' => 'shave_all'));
						}
						else
						{
							$thumbnail = new sfThumbnail($new_width);
						}
						
						$thumbnail->loadFile(sfConfig::get('upload_dir').'/original/'.$this->getName());
						$thumbnail->save(sfConfig::get('upload_dir').'/'.$format.'/'.$this->getName());
					}
				}
			}
		}
		else
		{
			if (!file_exists(sfConfig::get('upload_dir').'/doc'))
			{
				mkdir(sfConfig::get('upload_dir').'/doc', 0777);
			}
			
			move_uploaded_file($value['tmp_name'], sfConfig::get('upload_dir').'/doc/'.$this->getName());
		}
		
		parent::save();
	}

	

} // ElementFile
