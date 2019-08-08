<?php
/**
 * CMS Pico - Create websites using Pico CMS for Nextcloud.
 *
 * @copyright Copyright (c) 2019, Daniel Rudolf (<picocms.org@daniel-rudolf.de>)
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace OCA\CMSPico\Model;

use OCA\CMSPico\Files\StorageFile;
use OCP\Files\NotPermittedException;

class PicoAsset
{
	/** @var StorageFile */
	private $file;

	/** @var \DateTime|null */
	private $lastModified;

	/** @var string|null */
	private $secureMimeType;

	/**
	 * Asset constructor.
	 *
	 * @param StorageFile $file
	 */
	public function __construct(StorageFile $file)
	{
		$this->file = $file;

		if (!$this->isReadable()) {
			throw new NotPermittedException();
		}
	}

	/**
	 * @return string
	 */
	public function getPath(): string
	{
		return $this->file->getPath();
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->file->getName();
	}

	/**
	 * @return string
	 */
	public function getExtension(): string
	{
		return $this->file->getExtension();
	}

	/**
	 * @return string
	 */
	public function getETag(): string
	{
		return $this->file->getOCNode()->getEtag();
	}

	/**
	 * @return \DateTime
	 */
	public function getLastModified(): \DateTime
	{
		if ($this->lastModified === null) {
			$lastModifiedTime = $this->file->getOCNode()->getMTime();
			$this->lastModified = (new \DateTime())->setTimestamp($lastModifiedTime);
		}

		return $this->lastModified;
	}

	/**
	 * @return string
	 */
	public function getMimeType(): string
	{
		return $this->file->getOCNode()->getMimetype() ?: 'application/octet-stream';
	}

	/**
	 * @return string
	 */
	public function getSecureMimeType(): string
	{
		if ($this->secureMimeType === null) {
			$mimeTypeDetector = \OC::$server->getMimeTypeDetector();
			$this->secureMimeType = $mimeTypeDetector->getSecureMimeType($this->getMimeType());
		}

		return $this->secureMimeType;
	}

	/**
	 * @return bool
	 */
	public function isReadable(): bool
	{
		return $this->file->isReadable();
	}

	/**
	 * @return string
	 */
	public function getContent(): string
	{
		return $this->file->getContent();
	}
}
