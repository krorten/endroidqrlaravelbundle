<?php
/**
 * Created by PhpStorm.
 * User: jelle
 * Date: 23-12-2016
 * Time: 09:40
 */

namespace Dijkma\EndroidQrLaravelBundle\src;

use Endroid\QrCode\QrCode;
use Dijkma\EndroidQrLaravelBundle\exceptions\invalidConfigDataException;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;


class EndroidQr{

    /** @var QrCode */
    protected $qr;

    /** @var array */
    protected $options;

    /**
     * EndroidQr constructor.
     */
    public function __construct(){
        $this->qr = new QrCode();

        $this->options = config('qr');
    }

    /**
     * Blade function to create QR codes direct in a blade template.
     *
     * @param $configdata
     * @return string
     * @throws invalidConfigDataException
     */
    public function create($configdata){
        if(!is_array($configdata)){
            throw new invalidConfigDataException;
        }

        $this->setConfig($configdata);
        $this->setOptions();
        return $this->qr->getDataUri();
    }

    /**
     * Create a QR code from the url.
     * see the route file for the url.
     *
     * for the time being it uses default options!
     *
     * TODO: Make config options.
     *
     * @param $message
     * @return mixed
     */
    public function urlCreate($message){

        $this->options['Text'] = $message;
        $this->setOptions();

        return Response::make($this->qr->get(), 200, ['Content-Type' => $this->qr->getContentType()]);
    }

    /**
     * Set the config so that we can make changes during use.
     * We are not bound to default or set config values.
     *
     * This is different from the setOptions.
     * The setOptions is used to send the
     * config to the QR create class.
     *
     * @param $configdata
     */
    private function setConfig($configdata){
        foreach($configdata as $config => $value){
            if(array_key_exists($config, $this->options)){
                $this->options[$config] = $value;
            }
        }
    }

    /**
     * Set the config in de Endroid QR class
     * if a option is null we don't set it.
     */
    private function setOptions(){
        foreach ($this->options as $option => $value){
            if($value){
                $function = 'set'.$option;
                $this->qr->$function($value);
            }
        }
    }
}