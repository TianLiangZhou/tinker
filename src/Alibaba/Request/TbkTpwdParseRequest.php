<?php


namespace Tinker\Alibaba\Request;


use Exception;
use Tinker\Request;

class TbkTpwdParseRequest extends Request
{

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.

        return "taobao.tbk.tpwd.parse";
    }

    public function setPasswordContent($passwordContent)
    {
        $this->setApiParameter('password_content', $passwordContent);

        return $this;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function check()
    {
        // TODO: Implement check() method.
    }
}
