<?php

namespace App;

use Aws\Glacier\GlacierClient;
use Aws\Glacier\MultipartUploader;
use Exception;

class App
{
    const GLACIER_VERSION = '2012-06-01';

    /** @var GlacierClient */
    protected $glacier;

    /** @var string */
    protected $region;

    /** @var string */
    protected $vault;

    /** @var string */
    protected $access_key_id;

    /** @var string */
    protected $access_key_secret;

    /**
     * App constructor.
     * @param array $config
     * @param array $argv
     * @throws Exception
     */
    public function __construct($config)
    {
        if (isset($config['AWS_REGION'])) {
            $this->region = $config['AWS_REGION'];
        } else {
            throw new Exception('Please set AWS Region in config.php file');
        }

        if (isset($config['AWS_GLACIER_VAULT_NAME'])) {
            $this->vault = $config['AWS_GLACIER_VAULT_NAME'];
        } else {
            throw new Exception('Please set AWS Glacier vault name in config.php file');
        }

        if (isset($config['AWS_ACCESS_KEY_ID'])) {
            $this->access_key_id = $config['AWS_ACCESS_KEY_ID'];
        } else {
            throw new Exception('Please set AWS Access key ID in config.php file');
        }

        if (isset($config['AWS_ACCESS_KEY_SECRET'])) {
            $this->access_key_secret = $config['AWS_ACCESS_KEY_SECRET'];
        } else {
            throw new Exception('Please set AWS Access key secret in config.php file');
        }
    }

    public function init()
    {
        $this->glacier = new GlacierClient([
            'version' => self::GLACIER_VERSION,
            'region' => $this->region,
            'credentials' => [
                'key' => $this->access_key_id,
                'secret' => $this->access_key_secret
            ]
        ]);
        $this->uploadFile();
    }

    public function uploadFile()
    {
        $uploader = new MultipartUploader($this->glacier, 'php://stdin', [
            'vault_name' => $this->vault
        ]);
        $uploader->upload();
    }
}