<?php declare(strict_types=1);

namespace Macademy\Blog\Api\Data;

/**
* @api
* @since 1.0.0
*/
interface PostInterface
{

const ID = 'id';
const TITLE = 'title';
const CONTENT = 'content';
const CREATED_AT = 'created_at';

/**
* @return int
*/
public function getId();

/**
* @param int
* @return $this
*/
public function setId($id);

/**
* @return string
*/
public function getTitle();

/**
* @param string
* @return $this
*/
public function setTitle($title);

/**
* @return string
*/
public function getContent();

/**
* @param string
* @return $this
*/
public function setContent($content);

/**
* @return string
*/
public function getCreatedAt();

}
