# imi-laravel-database

<p align="center">
    <a href="https://www.imiphp.com" target="_blank">
        <img src="https://cdn.jsdelivr.net/gh/imiphp/imi@2.0/res/logo.png" alt="imi" />
    </a>
</p>

[![Latest Version](https://img.shields.io/packagist/v/imiphp/imi-laravel-database.svg)](https://packagist.org/packages/imiphp/imi-laravel-database)
![GitHub Workflow Status (branch)](https://img.shields.io/github/workflow/status/imiphp/imi-laravel-database/ci/dev)
[![Php Version](https://img.shields.io/badge/php-%3E=7.4-brightgreen.svg)](https://secure.php.net/)
[![Swoole Version](https://img.shields.io/badge/swoole-%3E=4.7.0-brightgreen.svg)](https://github.com/swoole/swoole-src)
[![imi Doc](https://img.shields.io/badge/docs-passing-green.svg)](https://doc.imiphp.com/v2.0/)
[![imi License](https://img.shields.io/badge/license-MulanPSL%201.0-brightgreen.svg)](https://github.com/imiphp/imi-laravel-database/blob/master/LICENSE)
[![star](https://gitee.com/yurunsoft/IMI/badge/star.svg?theme=gvp)](https://gitee.com/yurunsoft/IMI/stargazers)

## 介绍

实现在 imi 框架中使用 Laravel 的 `illuminate/database`，可以在 `imi-swoole`、`imi-fpm`、`imi-workerman`、`imi-roadrunner` 下运行。

## 开始使用

**引入组件：**`composer require imiphp/imi-laravel-database`

**使用：**

配置好 imi 的数据库连接池，目前只支持 pdo_mysql。

类 `\Illuminate\Support\Facades\DB` 使用 `\Illuminate\Support\Facades\DB` 替代。

其它使用完全一致，命令行功能暂未实现，逐步开发完善中。

[imi 完全开发手册](https://doc.imiphp.com/v2.0/)
[Laravel 中文文档](https://learnku.com/docs/laravel/8.5/database/10403#2b27b3)

## 运行环境

* Linux 系统 (Swoole 不支持在 Windows 上运行)
* [PHP](https://php.net/) >= 7.4
* [Composer](https://getcomposer.org/) >= 2.0
* [Swoole](https://www.swoole.com/) >= 4.7.0
* PDO 扩展

## 捐赠

![捐赠](https://cdn.jsdelivr.net/gh/imiphp/imi-laravel-database@2.0/res/pay.png)

开源不求盈利，多少都是心意，生活不易，随缘随缘……
