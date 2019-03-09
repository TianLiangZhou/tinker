<?php

namespace Tinker\Alibaba\Request;

use Tinker\Request;

/**
 * TOP API: taobao.tbk.tpwd.create request
 * 
 * @author auto create
 * @since 1.0, 2018.10.09
 */
class TbkTpwdCreateRequest extends Request
{
	/** 
	 * 扩展字段JSON格式
	 **/
	private $ext;
	
	/** 
	 * 口令弹框logoURL
	 **/
	private $logo;
	
	/** 
	 * 口令弹框内容
	 **/
	private $text;
	
	/** 
	 * 口令跳转目标页
	 **/
	private $url;
	
	/** 
	 * 生成口令的淘宝用户ID
	 **/
	private $userId;
	

	public function setExt($ext)
	{
		$this->setApiParameter('ext', $ext);
	}

	public function setLogo($logo)
	{
        $this->setApiParameter('logo', $logo);
	}

	public function setText($text)
	{
        $this->setApiParameter('text', $text);
	}

	public function setUrl($url)
	{
        $this->setApiParameter('url', $url);
	}

	public function setUserId($userId)
	{
        $this->setApiParameter('user_id', $userId);
	}

	public function getApiMethodName(): string
	{
		return "taobao.tbk.tpwd.create";
	}
	
	public function check()
	{

	}
}
