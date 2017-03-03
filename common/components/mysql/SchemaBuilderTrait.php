<?php

/**
 *   _   __ __ _____ _____ ___  ____  _____
 *  | | / // // ___//_  _//   ||  __||_   _|
 *  | |/ // /(__  )  / / / /| || |     | |
 *  |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.me/
 * @copyright Copyright (c) 2016 - 2017 vistart
 * @license https://vistart.me/license/
 */
namespace common\components\mysql;

use yii\db\Connection;
use yii\db\ColumnSchemaBuilder;

/**
 * @version 1.0
 * @author vistart <i@vistart.me>
 */
trait SchemaBuilderTrait
{
    /**
     * @return Connection the database connection to be used for schema building.
     */
    protected abstract function getDb();
    
    /**
     * 
     * @return ColumnSchemaBuilder
     */
    public function blob()
    {
        return $this->getDb()->getSchema()->createColumnSchemaBuilder(Schema::TYPE_BLOB);
    }
    
    /**
     * @inheritdoc
     */
    public function binary($length = null)
    {
        return $this->getDb()->getSchema()->createColumnSchemaBuilder(Schema::TYPE_BINARY, $length);
    }
    
    public function varbinary($length = null)
    {
        return $this->getDb()->getSchema()->createColumnSchemaBuilder(Schema::TYPE_VARBINARY, $length);
    }
    
    public function varchar($length = null)
    {
        return $this->getDb()->getSchema()->createColumnSchemaBuilder(Schema::TYPE_VARCHAR, $length);
    }
    
    public function binaryPk()
    {
        return $this->getDb()->getSchema()->createColumnSchemaBuilder(Schema::TYPE_BINARY_PK);
    }
}