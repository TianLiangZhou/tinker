<?php

namespace Tinker\Request\Alibaba;

use Tinker\Request;

/**
 * TOP API: taobao.tbk.dg.material.optional request
 * 
 * @author auto create
 * @since 1.0, 2018.09.06
 */
class TbkDgMaterialOptionalRequest extends Request
{
	/** 
	 * mm_xxx_xxx_xxx的第三位
	 **/
	private $adzoneId;
	
	/** 
	 * 后台类目ID，用,分割，最大10个，该ID可以通过taobao.itemcats.get接口获取到
	 **/
	private $cat;
	
	/** 
	 * 设备号加密类型：MD5
	 **/
	private $deviceEncrypt;
	
	/** 
	 * 设备号类型：IMEI，或者IDFA，或者UTDID
	 **/
	private $deviceType;
	
	/** 
	 * 设备号加密后的值
	 **/
	private $deviceValue;
	
	/** 
	 * KA媒体淘客佣金比率上限，如：1234表示12.34%
	 **/
	private $endKaTkRate;
	
	/** 
	 * 折扣价范围上限，单位：元
	 **/
	private $endPrice;
	
	/** 
	 * 淘客佣金比率上限，如：1234表示12.34%
	 **/
	private $endTkRate;
	
	/** 
	 * 是否有优惠券，设置为true表示该商品有优惠券，设置为false或不设置表示不判断这个属性
	 **/
	private $hasCoupon;
	
	/** 
	 * 好评率是否高于行业均值
	 **/
	private $includeGoodRate;
	
	/** 
	 * 成交转化是否高于行业均值
	 **/
	private $includePayRate30;
	
	/** 
	 * 退款率是否低于行业均值
	 **/
	private $includeRfdRate;
	
	/** 
	 * ip参数影响邮费获取，如果不传或者传入不准确，邮费无法精准提供
	 **/
	private $ip;
	
	/** 
	 * 是否海外商品，设置为true表示该商品是属于海外商品，设置为false或不设置表示不判断这个属性
	 **/
	private $isOverseas;
	
	/** 
	 * 是否商城商品，设置为true表示该商品是属于淘宝商城商品，设置为false或不设置表示不判断这个属性
	 **/
	private $isTmall;
	
	/** 
	 * 所在地
	 **/
	private $itemloc;
	
	/** 
	 * 官方的物料Id(详细物料id见：https://tbk.bbs.taobao.com/detail.html?appId=45301&postId=8576096)，不传时默认为2836
	 **/
	private $materialId;
	
	/** 
	 * 是否包邮，true表示包邮，空或false表示不限
	 **/
	private $needFreeShipment;
	
	/** 
	 * 是否加入消费者保障，true表示加入，空或false表示不限
	 **/
	private $needPrepay;
	
	/** 
	 * 牛皮癣程度，取值：1:不限，2:无，3:轻微
	 **/
	private $npxLevel;
	
	/** 
	 * 第几页，默认：１
	 **/
	private $pageNo;
	
	/** 
	 * 页大小，默认20，1~100
	 **/
	private $pageSize;
	
	/** 
	 * 链接形式：1：PC，2：无线，默认：１
	 **/
	private $platform;
	
	/** 
	 * 查询词
	 **/
	private $q;
	
	/** 
	 * 排序_des（降序），排序_asc（升序），销量（total_sales），淘客佣金比率（tk_rate）， 累计推广量（tk_total_sales），总支出佣金（tk_total_commi），价格（price）
	 **/
	private $sort;
	
	/** 
	 * 店铺dsr评分，筛选高于等于当前设置的店铺dsr评分的商品0-50000之间
	 **/
	private $startDsr;
	
	/** 
	 * KA媒体淘客佣金比率下限，如：1234表示12.34%
	 **/
	private $startKaTkRate;
	
	/** 
	 * 折扣价范围下限，单位：元
	 **/
	private $startPrice;
	
	/** 
	 * 淘客佣金比率下限，如：1234表示12.34%
	 **/
	private $startTkRate;
	
	private $apiParas = array();
	
	public function setAdzoneId($adzoneId)
	{
		$this->setApiParameter("adzone_id", $adzoneId);
	}


	public function setCat($cat)
	{
        $this->setApiParameter("cat", $cat);
	}


	public function setDeviceEncrypt($deviceEncrypt)
	{
        $this->setApiParameter("device_encrypt", $deviceEncrypt);
	}

	public function setDeviceType($deviceType)
	{
		$this->setApiParameter("device_type", $deviceType);
	}

	public function setDeviceValue($deviceValue)
	{
        $this->setApiParameter("device_value", $deviceValue);
	}


	public function setEndKaTkRate($endKaTkRate)
	{
        $this->setApiParameter("end_ka_tk_rate", $endKaTkRate);
	}


	public function setEndPrice($endPrice)
	{
        $this->setApiParameter("end_price", $endPrice);
	}


	public function setEndTkRate($endTkRate)
	{
        $this->setApiParameter("end_tk_rate", $endTkRate);
	}


	public function setHasCoupon($hasCoupon)
	{
        $this->setApiParameter("has_coupon", $hasCoupon);
	}


	public function setIncludeGoodRate($includeGoodRate)
	{
        $this->setApiParameter("include_good_rate", $includeGoodRate);
	}

	public function setIncludePayRate30($includePayRate30)
	{
        $this->setApiParameter("include_pay_rate_30", $includePayRate30);
	}

	public function setIncludeRfdRate($includeRfdRate)
	{
        $this->setApiParameter("include_rfd_rate", $includeRfdRate);
	}

	public function setIp($ip)
	{
        $this->setApiParameter("ip", $ip);
	}

	public function setIsOverseas($isOverseas)
	{
        $this->setApiParameter("is_overseas", $isOverseas);
	}
	public function setIsTmall($isTmall)
	{
        $this->setApiParameter("is_tmall", $isTmall);
	}

	public function setItemloc($itemloc)
	{
        $this->setApiParameter("itemloc", $itemloc);
	}
	public function setMaterialId($materialId)
	{
        $this->setApiParameter("material_id", $materialId);
	}

	public function setNeedFreeShipment($needFreeShipment)
	{
        $this->setApiParameter("need_free_shipment", $needFreeShipment);
	}
	public function setNeedPrepay($needPrepay)
	{
        $this->setApiParameter("need_prepay", $needPrepay);
	}
	public function setNpxLevel($npxLevel)
	{
        $this->setApiParameter("npx_level", $npxLevel);
	}
	public function setPageNo($pageNo)
	{
        $this->setApiParameter("page_no", $pageNo);
	}
	public function setPageSize($pageSize)
	{
        $this->setApiParameter("page_size", $pageSize);
	}

	public function setPlatform($platform)
	{
        $this->setApiParameter("platform", $platform);
	}

	public function setQ($q)
	{
        $this->setApiParameter("q", $q);
	}
	public function setSort($sort)
	{
        $this->setApiParameter("sort", $sort);
	}

	public function setStartDsr($startDsr)
	{
        $this->setApiParameter("start_dsr", $startDsr);
	}

	public function setStartKaTkRate($startKaTkRate)
	{
        $this->setApiParameter("start_ka_tk_rate", $startKaTkRate);
	}

	public function setStartPrice($startPrice)
	{
        $this->setApiParameter("start_price", $startPrice);
	}

	public function setStartTkRate($startTkRate)
	{
        $this->setApiParameter("start_tk_rate", $startTkRate);
	}

	public function getApiMethodName(): string
	{
		return "taobao.tbk.dg.material.optional";
	}
	
	public function check()
	{
		
	}
}
