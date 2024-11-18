# Chevereto: Ultimate image and video sharing software

<p align="center">
    <a href="https://chevereto.com"><img alt="Chevereto" src="chevereto.svg" width="80%"></a>
</p>

[![Chevereto](.github/banner/chevereto-ultimate-remix.png)](https://chevereto.com)

[![Chevereto Docs](https://img.shields.io/badge/chevereto-docs-50C878?style=flat-square)](https://v4-docs.chevereto.com/)
[![Chevereto Community](https://img.shields.io/badge/chevereto-community-blue?style=flat-square)](https://chevereto.com/community)
[![Chevereto Discord](https://img.shields.io/badge/chevereto-discord-5865F2?style=flat-square)](https://chevereto.com/go/discord)
[![Chevereto Demo](https://img.shields.io/badge/chevereto-demo-d4af37?style=flat-square)](https://demo.chevereto.com)
[![AGPL-3.0-only](https://img.shields.io/github/license/chevereto/chevereto?style=flat-square)](LICENSE)
[![Legacy stars](https://img.shields.io/github/stars/rodber/chevereto-free?style=flat-square&logo=github&label=Legacy%20stars&color=red)](https://github.com/rodber/chevereto-free)
[![Awesome F/OSS](https://img.shields.io/badge/Awesome_F%2FOSS-Certified-black?colorA=&colorB=874efe&style=flat-square)](https://awsmfoss.com/chevereto/)

> 🔔 [Subscribe](https://chevereto.com/go/newsletter) to don't miss any update regarding Chevereto.

Chevereto is a robust, self-hosted media-sharing platform that prioritizes flexibility and control. It enables you to build and manage a media-sharing website on your own server, granting you complete autonomy over your hosting environment and policies. With Chevereto, you eliminate the risk of platform restrictions and shutdowns, ensuring your site operates entirely on your terms.

Our [commercial edition](https://chevereto.com/pricing) is designed for running very large media-sharing services, offering scalability and tools to manage multiple users, high traffic, and extensive media collections.

🕹️ [Live demo](https://demo.chevereto.com)

![screen](.github/screen/user-profile.jpeg)

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

## Features

This is a short, not exhaustive, list of features available on Chevereto editions. Feel free to request a demo of the pro edition at [chevereto.com](https://chevereto.com) (free of any charge, no payment required) to see all the features in action.

## Files supported

Upload and share the following media types from device file browser, drag and drop, on-the-fly device camera, clipboard, URL, ShareX and via API.

* image/avif
* image/jpeg
* image/gif
* image/png
* image/webp
* image/bmp
* video/quicktime
* video/mp4
* video/webm

### Uploading features

* Image & Video uploads
* AVIF JPEG PNG BMP GIF WEBP MOV MP4 WEBM
* API uploading (ShareX, etc)
* Equirectangular 360° images
* EXIF data (read, strip)
* Clipboard upload
* Drag-and-drop upload (drop zone)
* File delete link
* Time-based expirable uploads
* Generate thumbs & medium sized images
* Generate video frame image
* Duplicate media detection
* Auto file-naming options
* Storage modes (date, direct)
* Upload user interface (container, page)
* Upload plugin (PUP.js, postMessage)
* Bulk importer

| Uploading features           | Free  | Lite  |         Pro          |
| ---------------------------- | :---: | :---: | :------------------: |
| Upload moderation            |   –   |   ✔   |          ✔           |
| Watermark image uploads      |   –   |   –   |          ✔           |
| Asset storage API            | Local | Local |         Any          |
| External storage servers API | Local | Local | All (S3, SFTP, etc.) |

### External storage APIs

| Storage API           | Free  | Lite  |  Pro  |
| --------------------- | :---: | :---: | :---: |
| Amazon S3             |   –   |   –   |   ✔   |
| S3 compatible         |   –   |   –   |   ✔   |
| Google Cloud Storage  |   –   |   –   |   ✔   |
| Microsoft Azure       |   –   |   –   |   ✔   |
| Alibaba Cloud OSS     |   –   |   –   |   ✔   |
| SFTP                  |   –   |   –   |   ✔   |
| FTP                   |   –   |   –   |   ✔   |
| OpenStack Swift       |   –   |   –   |   ✔   |
| Backblaze B2 (legacy) |   –   |   –   |   ✔   |

### Content features

* Listing viewer
* Dedicated Media, Album, Tags & Users listings
* Configure items per page
* Listing type (paginated/endless)
* Image listing size (fixed, fluid)
* Configure album listing requirement
* Configure listing columns per device (mobile, tablet, etc.)

### Organization features

* User defined Tags
* Albums & Sub-albums (nested)
* Categories
* Search
* Explore & Discovery

### Tags features

* On-the-fly tag creation
* Tag description
* Tag listings
* Tag filtering (users, albums)
* Tag autocomplete
* Top tags
* Exif camera model auto-tagging

### Album features

* Nested albums (breadcrumbs)
* Album cover image
* Album privacy
* Album password
* Album description

### Sharing features

* Direct link sharing
* Sharing button
* Media oEmbed
* HTML, Markdown & BBCodes
* Embed codes on upload complete
* Embed codes on selected media
* Embed codes media page

### User features

* User profiles
* Private user profiles
* User-based API

| User features   | Free  |         Lite          |          Pro          |
| --------------- | :---: | :-------------------: | :-------------------: |
| Roles available | admin | admin, manager & user | admin, manager & user |
| Multiple users  |   –   |           ✔           |           ✔           |
| User management |   –   |           ✔           |           ✔           |
| Guest API       |   –   |           ✔           |           ✔           |

### Social features

* Call-to-action album buttons
* Random button
* Notifications
* List users

| Social features | Free  | Lite  |  Pro  |
| --------------- | :---: | :---: | :---: |
| Followers       |   –   |   –   |   ✔   |
| Likes           |   –   |   –   |   ✔   |

### Security features

* Two-Factor Authentication (2FA)
* Encrypt secrets
* Crypt-salted IDs

| Feature    | Free  | Lite  |  Pro  |
| ---------- | :---: | :---: | :---: |
| IP banning |   –   |   –   |   ✔   |
| Stop words |   –   |   –   |   ✔   |

### Admin features

* Album creation on behalf of users
* Dashboard (admin UI)
* System stats & usage
* Website name
* Website doctitle
* Website description
* Website privacy mode (public, private)
* Default timezone
* Uploadable file extensions
* Guest uploads auto delete
* Upload threads
* Upload maximum image size
* Upload Exif removal
* Upload max file size (users and guest)
* Upload path
* Upload file naming
* Upload thumb size
* Upload medium size and dimension
* Semantics
* Default palette
* Default font
* Image load max file size
* Image first tab
* Embed codes (content)
* Custom JS & CSS
* Universal CDN support
* [Default language](https://v4-admin.chevereto.com/settings/languages.html#default-language)
* Logo & branding
* Logo type (vector, image, text)
* Logo height
* Logo favicon image

| Admin features                                                                                | Free  | Lite  |  Pro  |
| --------------------------------------------------------------------------------------------- | :---: | :---: | :---: |
| Homepage style                                                                                |   –   |   ✔   |   ✔   |
| Homepage cover images                                                                         |   –   |   ✔   |   ✔   |
| Homepage title & paragraph                                                                    |   –   |   ✔   |   ✔   |
| Homepage call to action                                                                       |   –   |   ✔   |   ✔   |
| Pages                                                                                         |   –   |   ✔   |   ✔   |
| Lock NSFW editing                                                                             |   –   |   ✔   |   ✔   |
| User min age required                                                                         |   –   |   ✔   |   ✔   |
| User avatar max file size                                                                     |   –   |   ✔   |   ✔   |
| User background max file size                                                                 |   –   |   ✔   |   ✔   |
| Guest API key                                                                                 |   –   |   ✔   |   ✔   |
| Hide "Powered by Chevereto" footer                                                            |   –   |   –   |   ✔   |
| [Enabled languages](https://v4-admin.chevereto.com/settings/languages.html#enabled-languages) |   –   |   –   |   ✔   |
| Routing (user, image, album)                                                                  |   –   |   –   |   ✔   |
| Routing root                                                                                  |   –   |   –   |   ✔   |
| External services                                                                             |   –   |   –   |   ✔   |
| Comments API (Disqus, JS)                                                                     |   –   |   –   |   ✔   |
| Analytics code                                                                                |   –   |   –   |   ✔   |
| Akismet spam protection                                                                       |   –   |   –   |   ✔   |
| StopForumSpam spam protection                                                                 |   –   |   –   |   ✔   |
| CAPTCHA (reCAPTCHA, hCaptcha)                                                                 |   –   |   –   |   ✔   |
| Configurable CAPTCHA threshold                                                                |   –   |   –   |   ✔   |
| Shield by Project Arachnid                                                                    |   –   |   –   |   ✔   |
| ModerateContent (auto approve, block, flag)                                                   |   –   |   –   |   ✔   |
| OAuth2 login providers (Amazon, Google, Discord, etc)                                         |   –   |   –   |   ✔   |
| Banners                                                                                       |   –   |   –   |   ✔   |
| Watermark uploads (guest, user, admin)                                                        |   –   |   –   |   ✔   |
| Watermark file toggles                                                                        |   –   |   –   |   ✔   |
| Watermark size requirement                                                                    |   –   |   –   |   ✔   |
| Watermark custom image                                                                        |   –   |   –   |   ✔   |
| Watermark position                                                                            |   –   |   –   |   ✔   |
| Watermark percentage                                                                          |   –   |   –   |   ✔   |
| Watermark margin                                                                              |   –   |   –   |   ✔   |
| Watermark opacity                                                                             |   –   |   –   |   ✔   |

### Admin toggles

* Search (users and guest)
* Explore (users and guest)
* Random (users and guest)
* NSFW listings
* Blur NSFW content
* NSFW on random mode
* Banners on NSFW
* Uploads (users and guest)
* Uploads (URL)
* Upload moderation
* Upload embed codes
* Upload redirection
* Upload duplication
* Upload expiration
* Upload NSFW checkbox
* Download button
* Right click
* Show Exif data
* Social share buttons
* Automatic updates check
* Dump update query
* Debug errors

| Admin toggles                                                                               | Free  | Lite  |  Pro  |
| ------------------------------------------------------------------------------------------- | :---: | :---: | :---: |
| Consent screen (age gate)                                                                   |   –   |   ✔   |   ✔   |
| User sign up                                                                                |   –   |   ✔   |   ✔   |
| User content delete                                                                         |   –   |   ✔   |   ✔   |
| User notify sign up                                                                         |   –   |   ✔   |   ✔   |
| User email confirmation                                                                     |   –   |   ✔   |   ✔   |
| User email for social login                                                                 |   –   |   ✔   |   ✔   |
| [Auto language](https://v4-admin.chevereto.com/settings/languages.html#auto-language)       |   –   |   –   |   ✔   |
| [Language chooser](https://v4-admin.chevereto.com/settings/languages.html#language-chooser) |   –   |   –   |   ✔   |
| SEO URLs (media and album)                                                                  |   –   |   –   |   ✔   |
| Cookie law compliance                                                                       |   –   |   –   |   ✔   |
| Flood protection                                                                            |   –   |   –   |   ✔   |
| Flood protection notify                                                                     |   –   |   –   |   ✔   |
| Watermarks                                                                                  |   –   |   –   |   ✔   |

### System features

* Image handling GD & ImageMagick
* Theme palettes (10)
* One-click upgrade (web & CLI)
* Maintenance mode
* Email SMTP + phpmail()
* Cipher ID
* Test-email
* Export user
* Regenerate external storage stats
* Migrate external storage records
* Docker support
* CLI console
* Built-in debugger ([xrDebug](https://xrdebug.com))
* Built-in REPL (PsySH)
* Supports Tinkerwel REPL
* Queue handling
* Configurable cache TTL
* Hreflang
* Session storage (files, redis)

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
