<?php

namespace yii\aliyunoss;

use yii\base\Component;
use yii\base\Exception;

class BaseOssClient extends Component
{
	protected $_ossClient;
	public $accessKeyId;
	public $accessKeySecret;
	public $endpoint;

	public function init()
	{
		if (static::class === self::class) {
			throw new Exception('BaseOssClient is an abstract class and cannot be instantiated directly.');
		}
		parent::init();
	}

	public function createBucket($bucket, $acl = self::OSS_ACL_TYPE_PRIVATE, $options = NULL)
	{
		return $this->_ossClient->createBucket($bucket, $acl, $options);
	}
	public function listBuckets($options = NULL)
	{
		return $this->_ossClient->listBuckets($options);
	}

	public function deleteBucket($bucket, $options = NULL)
	{
		return $this->_ossClient->deleteBucket($bucket, $options);
	}

	public function doesBucketExist($bucket)
	{
		return $this->_ossClient->doesBucketExist($bucket);
	}

	public function getBucketLocation($bucket)
	{
		return $this->_ossClient->getBucketLocation($bucket);
	}

	public function getBucketMeta($bucket, $options = NULL)
	{
		return $this->_ossClient->getBucketMeta($bucket, $options);
	}

	public function getBucketAcl($bucket, $options = NULL)
	{
		return $this->_ossClient->getBucketAcl($bucket, $options);
	}

	public function putBucketAcl($bucket, $acl, $options = NULL)
	{
		return $this->_ossClient->putBucketAcl($bucket, $acl, $options);
	}

	public function putObject($bucket, $object, $content, $options = NULL)
	{
		return $this->_ossClient->putObject($bucket, $object, $content, $options);
	}

	public function uploadFile($bucket, $object, $file, $options = NULL)
	{
		return $this->_ossClient->uploadFile($bucket, $object, $file, $options);
	}

	public function getObject($bucket, $object, $options = NULL)
	{
		return $this->_ossClient->getObject($bucket, $object, $options);
	}

	public function deleteObject($bucket, $object, $options = NULL)
	{
		return $this->_ossClient->deleteObject($bucket, $object, $options);
	}

	public function doesObjectExist($bucket, $object, $options = NULL)
	{
		return $this->_ossClient->doesObjectExist($bucket, $object, $options);
	}

	public function getObjectMeta($bucket, $object, $options = NULL)
	{
		return $this->_ossClient->getObjectMeta($bucket, $object, $options);
	}

	public function copyObject($fromBucket, $fromObject, $toBucket, $toObject, $options = NULL)
	{
		return $this->_ossClient->copyObject($fromBucket, $fromObject, $toBucket, $toObject, $options);
	}

	public function listObjects($bucket, $options = NULL)
	{
		return $this->_ossClient->listObjects($bucket, $options);
	}

	public function generatePresignedUrl($bucket, $object, $timeout = 3600, $options = NULL)
	{
		return $this->_ossClient->generatePresignedUrl($bucket, $object, $timeout, $options);
	}

	public function signUrl($bucket, $object, $timeout = 60, $method = self::OSS_HTTP_GET, $options = NULL)
	{
		return $this->_ossClient->signUrl($bucket, $object, $timeout, $method, $options);
	}

	public function putSymlink($bucket, $symlink, $targetObject, $options = NULL)
	{
		return $this->_ossClient->putSymlink($bucket, $symlink, $targetObject, $options);
	}

	public function getSymlink($bucket, $symlink, $options = NULL)
	{
		return $this->_ossClient->getSymlink($bucket, $symlink, $options);
	}

	public function getObjectAcl($bucket, $object, $options = NULL)
	{
		return $this->_ossClient->getObjectAcl($bucket, $object, $options);
	}

	public function putObjectAcl($bucket, $object, $acl, $options = NULL)
	{
		return $this->_ossClient->putObjectAcl($bucket, $object, $acl, $options);
	}

	public function appendObject($bucket, $object, $content, $position, $options = NULL)
	{
		return $this->_ossClient->appendObject($bucket, $object, $content, $position, $options);
	}

	public function initiateMultipartUpload($bucket, $object, $options = NULL)
	{
		return $this->_ossClient->initiateMultipartUpload($bucket, $object, $options);
	}

	public function uploadPart($bucket, $object, $uploadId, $options = NULL)
	{
		return $this->_ossClient->uploadPart($bucket, $object, $uploadId, $options);
	}

	public function listParts($bucket, $object, $uploadId, $options = NULL)
	{
		return $this->_ossClient->listParts($bucket, $object, $uploadId, $options);
	}

	public function completeMultipartUpload($bucket, $object, $uploadId, $listParts, $options = NULL)
	{
		return $this->_ossClient->completeMultipartUpload($bucket, $object, $uploadId, $listParts, $options);
	}

	public function abortMultipartUpload($bucket, $object, $uploadId, $options = NULL)
	{
		return $this->_ossClient->abortMultipartUpload($bucket, $object, $uploadId, $options);
	}

	public function listMultipartUploads($bucket, $options = NULL)
	{
		return $this->_ossClient->listMultipartUploads($bucket, $options);
	}

	public function uploadPartCopy($fromBucket, $fromObject, $toBucket, $toObject, $partNumber, $uploadId, $options = NULL)
	{
		return $this->_ossClient->uploadPartCopy($fromBucket, $fromObject, $toBucket, $toObject, $partNumber, $uploadId, $options);
	}

	public function restoreObject($bucket, $object, $options = NULL)
	{
		return $this->_ossClient->restoreObject($bucket, $object, $options);
	}

	public function processObject($bucket, $object, $process, $options = NULL)
	{
		return $this->_ossClient->processObject($bucket, $object, $process, $options);
	}

}
