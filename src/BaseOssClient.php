<?php

namespace yii\aliyunoss;

use OSS\OssClient;
use OSS\Core\OssException;
use yii\base\Component;
use yii\base\Exception;

class BaseOssClient extends Component
{
	/**
	 * @var \OSS\OssClient OSS客户端实例
	 */
	protected $_ossClient;

	/**
	 * @var string 访问密钥ID
	 */
	public $accessKeyId;

	/**
	 * @var string 访问密钥密码
	 */
	public $accessKeySecret;

	/**
	 * @var string OSS访问域名
	 */
	public $endpoint;

	/**
	 * @var string OSS地域
	 */
	public $region;

	/**
	 * 初始化组件
	 * @throws Exception 当直接实例化BaseOssClient时抛出异常
	 */
	public function init()
	{
		if (static::class === self::class) {
			throw new Exception('BaseOssClient is an abstract class and cannot be instantiated directly.');
		}
		parent::init();
	}


	/**
	 * 创建存储空间(Bucket)
	 * @param string $bucket Bucket名称
	 * @param string $acl 访问权限,默认为私有
	 * @param array|null $options 可选参数
	 * @return mixed 创建Bucket的结果
	 * @throws OssException 创建Bucket失败时抛出异常
	 */
	public function createBucket($bucket, $acl = OssClient::OSS_ACL_TYPE_PRIVATE, $options = NULL)
	{
		return $this->_ossClient->createBucket($bucket, $acl, $options);
	}

	/**
	 * 列出所有存储空间(Bucket)
	 * @param array|null $options 可选参数
	 * @return mixed 列出Bucket的结果
	 * @throws OssException 列出Bucket失败时抛出异常
	 */
	public function listBuckets($options = NULL)
	{
		return $this->_ossClient->listBuckets($options);
	}


	/**
	 * 删除存储空间(Bucket)
	 * @param string $bucket Bucket名称
	 * @param array|null $options 可选参数
	 * @return mixed 删除Bucket的结果
	 * @throws OssException 删除Bucket失败时抛出异常
	 */
	public function deleteBucket($bucket, $options = NULL)
	{
		return $this->_ossClient->deleteBucket($bucket, $options);
	}

	/**
	 * 检查存储空间(Bucket)是否存在
	 * @param string $bucket Bucket名称
	 * @return bool 如果Bucket存在则返回true，否则返回false
	 */
	public function doesBucketExist($bucket)
	{
		return $this->_ossClient->doesBucketExist($bucket);
	}

	/**
	 * 获取存储空间(Bucket)的地域
	 * @param string $bucket Bucket名称
	 * @return string 存储空间(Bucket)的地域
	 */
	public function getBucketLocation($bucket)
	{
		return $this->_ossClient->getBucketLocation($bucket);
	}

	/**
	 * 获取存储空间(Bucket)的元数据
	 * @param string $bucket Bucket名称
	 * @param array|null $options 可选参数
	 * @return mixed 获取Bucket元数据的结果
	 * @throws OssException 获取Bucket元数据失败时抛出异常
	 */
	public function getBucketMeta($bucket, $options = NULL)
	{
		return $this->_ossClient->getBucketMeta($bucket, $options);
	}

	/**
	 * 获取存储空间(Bucket)的访问权限
	 * @param string $bucket Bucket名称
	 * @param array|null $options 可选参数
	 * @return mixed 获取Bucket访问权限的结果
	 * @throws OssException 获取Bucket访问权限失败时抛出异常
	 */
	public function getBucketAcl($bucket, $options = NULL)
	{
		return $this->_ossClient->getBucketAcl($bucket, $options);
	}

	/**
	 * 设置存储空间(Bucket)的访问权限
	 * @param string $bucket Bucket名称
	 * @param string $acl 访问权限
	 * @param array|null $options 可选参数
	 * @return mixed 设置Bucket访问权限的结果
	 * @throws OssException 设置Bucket访问权限失败时抛出异常
	 */
	public function putBucketAcl($bucket, $acl, $options = NULL)
	{
		return $this->_ossClient->putBucketAcl($bucket, $acl, $options);
	}

	/**
	 * 上传文件到OSS
	 * @param string $bucket Bucket名称
	 * @param string $object 对象名称
	 * @param string $content 文件内容
	 * @param array|null $options 可选参数
	 * @return mixed 上传文件的结果
	 * @throws OssException 上传文件失败时抛出异常
	 */
	public function putObject($bucket, $object, $content, $options = NULL)
	{
		return $this->_ossClient->putObject($bucket, $object, $content, $options);
	}

	/**
	 * 上传文件到OSS
	 * @param string $bucket Bucket名称
	 * @param string $object 对象名称
	 * @param string $file 文件路径
	 * @param array|null $options 可选参数
	 * @return mixed 上传文件的结果
	 * @throws OssException 上传文件失败时抛出异常
	 */
	public function uploadFile($bucket, $object, $file, $options = NULL)
	{
		return $this->_ossClient->uploadFile($bucket, $object, $file, $options);
	}

	/**
	 * 获取OSS中的文件
	 * @param string $bucket Bucket名称
	 * @param string $object 对象名称
	 * @param array|null $options 可选参数
	 * @return mixed 获取文件的结果
	 * @throws OssException 获取文件失败时抛出异常
	 */
	public function getObject($bucket, $object, $options = NULL)
	{
		return $this->_ossClient->getObject($bucket, $object, $options);
	}

	/**
	 * 删除OSS中的文件
	 * @param string $bucket Bucket名称
	 * @param string $object 对象名称
	 * @param array|null $options 可选参数
	 * @return mixed 删除文件的结果
	 * @throws OssException 删除文件失败时抛出异常
	 */
	public function deleteObject($bucket, $object, $options = NULL)
	{
		return $this->_ossClient->deleteObject($bucket, $object, $options);
	}

	/**
	 * 检查OSS中的文件是否存在
	 * @param string $bucket Bucket名称
	 * @param string $object 对象名称
	 * @param array|null $options 可选参数
	 * @return bool 如果文件存在则返回true，否则返回false
	 */
	public function doesObjectExist($bucket, $object, $options = NULL)
	{
		return $this->_ossClient->doesObjectExist($bucket, $object, $options);
	}

	/**
	 * 获取OSS中的文件元数据
	 * @param string $bucket Bucket名称
	 * @param string $object 对象名称
	 * @param array|null $options 可选参数
	 * @return mixed 获取文件元数据的结果
	 * @throws OssException 获取文件元数据失败时抛出异常
	 */
	public function getObjectMeta($bucket, $object, $options = NULL)
	{
		return $this->_ossClient->getObjectMeta($bucket, $object, $options);
	}

	/**
	 * 复制OSS中的文件
	 * @param string $fromBucket 源Bucket名称
	 * @param string $fromObject 源对象名称
	 * @param string $toBucket 目标Bucket名称
	 * @param string $toObject 目标对象名称
	 * @param array|null $options 可选参数
	 * @return mixed 复制文件的结果
	 * @throws OssException 复制文件失败时抛出异常
	 */
	public function copyObject($fromBucket, $fromObject, $toBucket, $toObject, $options = NULL)
	{
		return $this->_ossClient->copyObject($fromBucket, $fromObject, $toBucket, $toObject, $options);
	}

	/**
	 * 列出存储空间(Bucket)中的文件
	 * @param string $bucket Bucket名称
	 * @param array|null $options 可选参数
	 * @return mixed 列出文件的结果
	 * @throws OssException 列出文件失败时抛出异常
	 */
	public function listObjects($bucket, $options = NULL)
	{
		return $this->_ossClient->listObjects($bucket, $options);
	}

	/**
	 * 生成预签名URL
	 * @param string $bucket Bucket名称
	 * @param string $object 对象名称
	 * @param int $timeout 过期时间
	 * @param array|null $options 可选参数
	 * @return mixed 生成预签名URL的结果
	 * @throws OssException 生成预签名URL失败时抛出异常
	 */
	public function generatePresignedUrl($bucket, $object, $timeout = 3600, $options = NULL)
	{
		return $this->_ossClient->generatePresignedUrl($bucket, $object, $timeout, $options);
	}

	/**
	 * 生成签名URL
	 * @param string $bucket Bucket名称
	 * @param string $object 对象名称
	 * @param int $timeout 过期时间
	 * @param string $method 请求方法
	 * @param array|null $options 可选参数
	 * @return mixed 生成签名URL的结果
	 * @throws OssException 生成签名URL失败时抛出异常
	 */
	public function signUrl($bucket, $object, $timeout = 60, $method = self::OSS_HTTP_GET, $options = NULL)
	{
		return $this->_ossClient->signUrl($bucket, $object, $timeout, $method, $options);
	}

	/**
	 * 创建符号链接
	 * @param string $bucket Bucket名称
	 * @param string $symlink 符号链接名称
	 * @param string $targetObject 目标对象名称
	 * @param array|null $options 可选参数
	 * @return mixed 创建符号链接的结果
	 * @throws OssException 创建符号链接失败时抛出异常
	 */
	public function putSymlink($bucket, $symlink, $targetObject, $options = NULL)
	{
		return $this->_ossClient->putSymlink($bucket, $symlink, $targetObject, $options);
	}

	/**
	 * 获取符号链接
	 * @param string $bucket Bucket名称
	 * @param string $symlink 符号链接名称
	 * @param array|null $options 可选参数
	 * @return mixed 获取符号链接的结果
	 * @throws OssException 获取符号链接失败时抛出异常
	 */
	public function getSymlink($bucket, $symlink, $options = NULL)
	{
		return $this->_ossClient->getSymlink($bucket, $symlink, $options);
	}

	/**
	 * 获取文件的访问权限
	 * @param string $bucket Bucket名称
	 * @param string $object 对象名称
	 * @param array|null $options 可选参数
	 * @return mixed 获取文件访问权限的结果
	 * @throws OssException 获取文件访问权限失败时抛出异常
	 */
	public function getObjectAcl($bucket, $object, $options = NULL)
	{
		return $this->_ossClient->getObjectAcl($bucket, $object, $options);
	}

	/**
	 * 设置文件的访问权限
	 * @param string $bucket Bucket名称
	 * @param string $object 对象名称
	 * @param string $acl 访问权限
	 * @param array|null $options 可选参数
	 * @return mixed 设置文件访问权限的结果
	 * @throws OssException 设置文件访问权限失败时抛出异常
	 */
	public function putObjectAcl($bucket, $object, $acl, $options = NULL)
	{
		return $this->_ossClient->putObjectAcl($bucket, $object, $acl, $options);
	}

	/**
	 * 追加文件
	 * @param string $bucket Bucket名称
	 * @param string $object 对象名称
	 * @param string $content 文件内容
	 * @param int $position 追加位置
	 * @param array|null $options 可选参数
	 * @return mixed 追加文件的结果
	 * @throws OssException 追加文件失败时抛出异常
	 */
	public function appendObject($bucket, $object, $content, $position, $options = NULL)
	{
		return $this->_ossClient->appendObject($bucket, $object, $content, $position, $options);
	}

	/**
	 * 初始化分片上传
	 * @param string $bucket Bucket名称
	 * @param string $object 对象名称
	 * @param array|null $options 可选参数
	 * @return mixed 初始化分片上传的结果
	 * @throws OssException 初始化分片上传失败时抛出异常
	 */
	public function initiateMultipartUpload($bucket, $object, $options = NULL)
	{
		return $this->_ossClient->initiateMultipartUpload($bucket, $object, $options);
	}

	/**
	 * 上传分片
	 * @param string $bucket Bucket名称
	 * @param string $object 对象名称
	 * @param string $uploadId 上传ID
	 * @param array|null $options 可选参数
	 * @return mixed 上传分片的结果
	 * @throws OssException 上传分片失败时抛出异常
	 */
	public function uploadPart($bucket, $object, $uploadId, $options = NULL)
	{
		return $this->_ossClient->uploadPart($bucket, $object, $uploadId, $options);
	}

	/**
	 * 列出分片
	 * @param string $bucket Bucket名称
	 * @param string $object 对象名称
	 * @param string $uploadId 上传ID
	 * @param array|null $options 可选参数
	 * @return mixed 列出分片的结果
	 * @throws OssException 列出分片失败时抛出异常
	 */
	public function listParts($bucket, $object, $uploadId, $options = NULL)
	{
		return $this->_ossClient->listParts($bucket, $object, $uploadId, $options);
	}

	/**
	 * 完成分片上传
	 * @param string $bucket Bucket名称
	 * @param string $object 对象名称
	 * @param string $uploadId 上传ID
	 * @param array $listParts 分片列表
	 * @param array|null $options 可选参数
	 * @return mixed 完成分片上传的结果
	 * @throws OssException 完成分片上传失败时抛出异常
	 */
	public function completeMultipartUpload($bucket, $object, $uploadId, $listParts, $options = NULL)
	{
		return $this->_ossClient->completeMultipartUpload($bucket, $object, $uploadId, $listParts, $options);
	}

	/**
	 * 中止分片上传
	 * @param string $bucket Bucket名称
	 * @param string $object 对象名称
	 * @param string $uploadId 上传ID
	 * @param array|null $options 可选参数
	 * @return mixed 中止分片上传的结果
	 * @throws OssException 中止分片上传失败时抛出异常
	 */
	public function abortMultipartUpload($bucket, $object, $uploadId, $options = NULL)
	{
		return $this->_ossClient->abortMultipartUpload($bucket, $object, $uploadId, $options);
	}

	/**
	 * 列出分片上传
	 * @param string $bucket Bucket名称
	 * @param array|null $options 可选参数
	 * @return mixed 列出分片上传的结果
	 * @throws OssException 列出分片上传失败时抛出异常
	 */
	public function listMultipartUploads($bucket, $options = NULL)
	{
		return $this->_ossClient->listMultipartUploads($bucket, $options);
	}

	/**
	 * 上传分片复制
	 * @param string $fromBucket 源Bucket名称
	 * @param string $fromObject 源对象名称
	 * @param string $toBucket 目标Bucket名称
	 * @param string $toObject 目标对象名称
	 * @param int $partNumber 分片编号
	 * @param string $uploadId 上传ID
	 * @param array|null $options 可选参数
	 * @return mixed 上传分片复制的结果
	 * @throws OssException 上传分片复制失败时抛出异常
	 */
	public function uploadPartCopy($fromBucket, $fromObject, $toBucket, $toObject, $partNumber, $uploadId, $options = NULL)
	{
		return $this->_ossClient->uploadPartCopy($fromBucket, $fromObject, $toBucket, $toObject, $partNumber, $uploadId, $options);
	}

	/**
	 * 恢复归档文件
	 * @param string $bucket Bucket名称
	 * @param string $object 对象名称
	 * @param array|null $options 可选参数
	 * @return mixed 恢复归档文件的结果
	 * @throws OssException 恢复归档文件失败时抛出异常
	 */
	public function restoreObject($bucket, $object, $options = NULL)
	{
		return $this->_ossClient->restoreObject($bucket, $object, $options);
	}

	/**
	 * 处理文件
	 * @param string $bucket Bucket名称
	 * @param string $object 对象名称
	 * @param string $process 处理命令
	 * @param array|null $options 可选参数
	 * @return mixed 处理文件的结果
	 * @throws OssException 处理文件失败时抛出异常
	 */
	public function processObject($bucket, $object, $process, $options = NULL)
	{
		return $this->_ossClient->processObject($bucket, $object, $process, $options);
	}

}
