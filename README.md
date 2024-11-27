# Chevereto: Ultimate image and video sharing software

<p align="center">
    <a href="https://chevereto.com"><img alt="Chevereto" src="chevereto.svg" width="80%"></a>
</p>

[![Chevereto](.github/banner/chevereto-ultimate-remix.png)](https://chevereto.com)

[![Chevereto Docs](https://img.shields.io/badge/chevereto-docs-50C878?style=flat-square)](https://v4-docs.chevereto.com/)
[![Chevereto Community](https://img.shields.io/badge/chevereto-community-blue?style=flat-square)](https://chevereto.com/community)
[![Chevereto Demo](https://img.shields.io/badge/chevereto-demo-d4af37?style=flat-square&color=red)](https://demo.chevereto.com)
[![AGPL-3.0-only](https://img.shields.io/github/license/chevereto/chevereto?style=flat-square)](LICENSE)
[![Legacy stars](https://img.shields.io/github/stars/rodber/chevereto-free?style=flat-square&logo=github&label=Legacy%20stars&color=gold)](https://github.com/rodber/chevereto-free)
[![Awesome F/OSS](https://img.shields.io/badge/Awesome_F%2FOSS-Certified-black?colorA=&colorB=874efe&style=flat-square)](https://awsmfoss.com/chevereto/)

> 🔔 [Subscribe](https://chevereto.com/go/newsletter) to don't miss any update regarding Chevereto.

Chevereto is a robust, self-hosted media-sharing platform that prioritizes flexibility and control. It enables you to build and manage a media-sharing website on your own server, granting you complete autonomy over your hosting environment and policies. With Chevereto, you eliminate the risk of platform restrictions and shutdowns, ensuring your site operates entirely on your terms.

This is the repository for **Chevereto Free** edition. You can [compare editions](https://v4-docs.chevereto.com/introduction/editions/compare.html) to find the Chevereto edition that best suits your needs.

![screen](.github/screen/user-listing-selected.webp)

## Requirements

* A [webserver](https://v4-docs.chevereto.com/application/stack/web-server.html) (Apache recommended)
* [PHP](https://v4-docs.chevereto.com/application/stack/php.html) 8.1+ with [extensions](https://v4-docs.chevereto.com/application/stack/php.html#extensions)
* [MySQL Server](https://v4-docs.chevereto.com/application/stack/mysql-server.html) 8.0.1+ or MariaDB Server 10.2.2+

## Install

Chevereto runs anywhere, system requirements are minimal and it can run on any server.

Install Chevereto following our guides for:

* [Docker](https://github.com/chevereto/docker) (Multi-arch image compatible with `x86_64` and `arm64`)
  * [Pure Docker](https://v4-docs.chevereto.com/guides/docker/pure-docker)
  * [Chevereto Docker](https://v4-docs.chevereto.com/guides/docker/)
* [VPS](https://v4-docs.chevereto.com/guides/server/vps) (DigitalOcean, Linode, Vultr, etc)
* [cPanel](https://v4-docs.chevereto.com/guides/cpanel/)
* [Plesk](https://v4-docs.chevereto.com/guides/plesk/)

Chevereto is also available at [DigitalOcean Marketplace](https://chevereto.com/go/digitalocean), [Vultr Marketplace](https://chevereto.com/go/vultr), [Installatron](https://installatron.com/chevereto), [Softaculous](https://www.softaculous.com/apps/galleries/Chevereto) and [SwiftWave](https://swiftwave.org/docs/dashboard/swiftwave_app_store/).

Review our [Installation docs](https://v4-docs.chevereto.com/application/installing/installation.html) for all alternatives.

## Updating

* Follow the [Updating guide](https://v4-docs.chevereto.com/application/installing/updating.html) to keep your Chevereto V4 system updated.

## Upgrading

For Chevereto V3 users:

* Follow the [Upgrading guide](https://v4-docs.chevereto.com/application/installing/upgrading.html) to upgrade to Chevereto V4.
* Check the [Welcome Back](https://v4-docs.chevereto.com/introduction/changelog/welcome-back.html#from-chevereto-v3) reference.

For Chevereto V2 users:

* Follow the [Upgrading guide](https://v3-docs.chevereto.com/setup/server/upgrading.html) but skip directly to Chevereto V4.

## Documentation

Chevereto [Documentation](https://v4-docs.chevereto.com) covers the system requirements, installation, configuration, and usage of the software. It also includes a [User manual](https://v4-user.chevereto.com/) and an [Admin manual](https://v4-admin.chevereto.com/).

## Contributing

Chevereto is an open-source project, and while contributions are welcomed, they are entirely voluntary. We appreciate any assistance aimed at enhancing the software and making it better for the community. Please note that any contributions to this repository will fall under the AGPLv3 license, ensuring that your work remains open-source and accessible to all.

## License

### Open Source license

Copyright [Rodolfo Berríos Arce](http://rodolfoberrios.com) - [AGPLv3](LICENSE).

This program is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License along with this program. If not, see [GNU Licenses](http://www.gnu.org/licenses/).

### Commercial license

The commercial license allows you to use Chevereto in commercial products and applications without the obligations imposed by the AGPLv3. The commercial license ensures that your code remains proprietary and exclusive to you. For more details, please refer to the Chevereto Commercial License at [Chevereto License](https://chevereto.com/license).

### Compare licenses

The Chevereto Free edition is licensed under AGPLv3, allowing free use as long as you comply with its terms. If you modify and distribute the software, you are required to provide the source code to your users.

Both **Chevereto Lite** and **Chevereto Pro** are distributed under the proprietary **Chevereto License**, which permits use for commercial purposes.

*Note: Proprietary licensing does not mean closed source; the source code is accessible, but its use is governed by the specific terms of the Chevereto License.*
