<?php
namespace zertex\GeoIP;

use MaxMind\Db\Reader;
use Yii;
use yii\base\Component;
use yii\web\Session;

/**
 * Class GeoIP
 */
class GeoIP extends Component 
{
    /**
     * @var Reader
     */
    private $reader;

    /**
     * @var array
     */
    private $result = [];

    /**
     * @var Session
     */
    private $session;

    /**
     * @inheritDoc
     */
    public function init() 
    {
        $db = Yii::getAlias('@vendor/zertex/yii2-zx-country-db/GeoLite2-Country.mmdb');
        $this->session = Yii::$app->session;
        $this->reader = new Reader($db);
        parent::init();
    }

    /**
     * @param string|null $ip
     * @return Result
     */
    public function ip($ip = null)
    {
        if ($ip === null)
        {
            $ip = Yii::$app->request->getUserIP();
        }

        if (!array_key_exists($ip, $this->result))
        {
            $key = self::className() . ':' . $ip;
            if ($this->session->offsetExists($key))
            {
                $this->result[$ip] = $this->session->get($key);
            }
            else
            {
                $result = $this->reader->get($ip);
                $this->result[$ip] = new Result($result);
                $this->session->set($key, $this->result[$ip]);
            }
        }
        return $this->result[$ip];
    }
}
