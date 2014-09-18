=== Chinese Tag Names ===
Contributors: CoconutCN
Donate link: http://nutsland.cn
Tags: tag, chinese, link, url, permalink, 中文, 标签, 链接, 固定链接
Requires at least: 2.0.2
Stable tag: 1.1

解决中文标签名(已支持所有含中文的固定链接)不能访问的问题。

== Description ==

在Wordpress中设定了固定链接之后，有时（多见于Win主机）会出现中文标签（Tag）的固定链接不能访问的问题。<br>
即 `http://example.com/tag/中文` 不能访问，而 `http://example.com/?tag=中文` 可以访问。

可以通过修改Wordpress内核函数的方式来解决，但是每次Wordpress升级都要重新修改一次，比较麻烦。

本插件提供了便捷的解决方法。

现在支持所有包含中文的固定链接了，包括标签、分类、作者存档页面、文章名等，例如：

* `http://example.com/tag/中文标签`
* `http://example.com/category/中文分类`
* `http://example.com/archives/中文文章名`
* `http://example.com/archives/author/中文作者名`
* `http://example.com/中文页面名`

插件主页：<br>`http://nutsland.cn/blog/archives/177.html`<br>欢迎提问和反馈使用情况。

== Installation ==

= 手动安装 =
1. 下载并解压插件压缩包，得到 `chinese-tag-names` 文件夹。
2. 将 `chinese-tag-names` 文件夹上传到Wordpress的 `wp-content/plugins` 目录下。
3. 登录Wordpress后台，启用 `Chinese Tag Names` 插件。

= 自动安装 =
1. 登录Wordpress后台，在插件安装中搜索 `Chinese Tag Names` 。
2. 点击“现在安装”。
3. 安装完毕后，启用 `Chinese Tag Names` 插件。

== Changelog ==

= 1.1 =
* 修复了不能搜索中文的BUG。

= 1.0.10 =
* 优化了代码。

= 1.0.8 = 
* 现在支持所有包含中文的固定链接了，包括标签、分类、作者存档页面、文章名等。

= 1.0.6 =
* 修复翻页链接错误的Bug。

= 1.0.4 =
* 修复一个Bug。

= 1.0.3 =
* 建立插件页面。

= 1.0.2 =
* 完善了插件文档。

= 1.0 =
* 第一个发布版本。
