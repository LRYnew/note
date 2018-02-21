# -*- coding:utf-8 -*-
# python 自带的url请求模块
from urllib import request
import re


# 类
class Spider():
    url = 'https://www.panda.tv/cate/lol?pdt=1.24.s1.3.3ajvi8thtg5'
    root_pattern = '<div class="video-info">([\s\S]*?)</div>'
    name_pattern = '<span class="video-nickname" title="([\s\S]*?)">'
    count_pattern = '<i class="video-station-num">([\s\S]*?)</i>'

    # 获取html内容
    def __fetch_content(self):
        r = request.urlopen(self.__class__.url)
        # 读取出来为字节型字符串，需进行格式转换
        htmls = str(r.read(), encoding='utf-8')
        return htmls

    # 分析数据
    def __analysis(self, htmls):
        anchors = []
        result = re.findall(self.__class__.root_pattern, htmls, re.I)

        # 循环
        for html in result:
            name = re.findall(self.__class__.name_pattern, html)
            count = re.findall(self.__class__.count_pattern, html)
            anchor = {"name": name, "count": count}
            anchors.append(anchor)
        return anchors

    # 精炼数据
    def __refine(self, anchors):
        return list(map(lambda anchor: {
            "name": anchor['name'][0].strip() if anchor['name'] else '没有主播名',
            "count": anchor['count'][0]
        }, anchors))

    # 排序
    def __sort(self, anchors):
        r = sorted(anchors, key=self.__sort_seed, reverse=True)
        return r

    # 排序种子
    def __sort_seed(self, anchor):
        r = re.findall('\d*', anchor['count'])
        r = float(r[0])
        if '万' in anchor['count']:
            r *= 10000
        return r
    
    # 显示
    def __show(self, anchors):
        n = 0
        for anchor in anchors:
            n += 1
            print(
                '第' + str(n) + '名：' + anchor['name'] + ' -- ' + anchor['count']
            )

    # 入口
    def go(self):
        htmls = self.__fetch_content()
        anchors = self.__analysis(htmls)
        anchors = list(self.__refine(anchors))
        anchors = self.__sort(anchors)
        self.__show(anchors)


spider = Spider()
spider.go()
