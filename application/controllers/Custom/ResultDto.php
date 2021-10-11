<?php
class ResultDto{
	private $result;
	private $msg;
	private $data;

	public function __constructor()
	{
		$this->result = 0;
		$this->result = array();
		$this->msg = "Error al obtener datos";
	}

	public function getResponseJSON()
	{
		return json_encode(array('result'=>$this->result, 'data'=>$this->data,'msg'=>$this->msg));
	}

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     *
     * @return self
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * @param mixed $msg
     *
     * @return self
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     *
     * @return self
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}