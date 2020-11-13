"use strict";

class Util {

  /**
   * 根据给定的父元素获取该父元素下所有节点(包括子节点的子节点)
   * @param  {Element} parentNode 父元素
   * @return {Array}            节点数组
   */
  static getAllElement (parentNode) {
    let nodeList = [];
    let childrenNodeList = parentNode.children;

    if (parentNode.children.length !== 0) {
      for (let i = 0; i < childrenNodeList.length; i++) {
        nodeList.push(childrenNodeList[i]);
        nodeList = nodeList.concat(this.getAllElement(childrenNodeList[i]));
      }
    }

    return nodeList;
  }
  
  /**
   * 获取给定节点所有节点合计大小
   * 会获取实际大小, 就算溢出也会计算
   * @param  {[type]} node [description]
   * @return {Array}       [width, height]
   */
  static getNodeOriginalSize (node) {
    let area = [0, 0];
    let childNodes = Util.getAllElement(node);
    childNodes.forEach((n) => {
      if (getComputedStyle(n, null).position == 'absolute') return;
      area[0] = n.offsetWidth > area[0] ? n.offsetWidth : area[0];
      if (n.parentNode === node)
        area[1] += n.offsetHeight;
    });
    return area;
  }

  /**
   * 将方法转化为异步方法
   * @param {Function} method   需要转换的方法
   * @param {Number}   waitTime 等待多少秒后执行
   * @return {Function}         返回转换后的Promise对象
   */
  static convertAsyncMethod (method, waitTime = 0) {
    return new Promise(function(resolve) {
      if (waitTime > 0) {
        setTimeout(function() {
          method();
          resolve();
        }, waitTime * 1000);
      } else {
        method();
        resolve();        
      }
    });
  }

  /**
   * 获取当前页面中的最大层级
   * @return {Number} 只有通过position进行定位的元素z-index值才会被获取到.
   */
  static maxZIndex() {
    let allNodes = Array.from(document.all);
    return parseInt(allNodes.reduce(function(prev, currNode) {
      let currNodeZIndex = getComputedStyle(currNode, null).zIndex;
      return Math.max(prev, !isNaN(currNodeZIndex) ? currNodeZIndex : 0);
    }, 0));
  };

  /**
   * 绑定一个事件委托
   * @param  {Node}     node       DOM对象
   * @param  {String}   selector   CSS选择器
   * @param  {String}   type       事件类型
   * @param  {Function} callback   回调函数
   * @param  {Boolean}  useCapture 是否捕获
   */
  static eventTarget (node, selector, type, callback, useCapture = false) {
    node.addEventListener(type, function (event) {
      if (event.target === node || event.target.contains(node)) return false;
      let targetNodes = Array.from(node.querySelectorAll(selector));
      if (targetNodes.indexOf(event.target) !== -1) {
        callback.apply(event.target);
      } else {
        let parentNode = event.target.parentNode;
        while (parentNode !== node) {
          if (targetNodes.indexOf(parentNode) !== -1) {
            callback.apply(parentNode);
            break;
          } else {
            parentNode = parentNode.parentNode;
          }
        }
      }
    }, useCapture);
  }

  /**
   * 传入一个对象, 返回DOM节点数组
   * @param  {Object} nodeList 描述DOM结构的对象
   * @return {Object}  DOM节点对象
   */
  static objectToDom (nodeList) {
    let buildNode = {};
    for (let item in nodeList) {
      let node = document.createElement(nodeList[item]['nodeType']);
      if (typeof nodeList[item]['nodeType'] != 'undefined') {
        for (let attr in nodeList[item]) {
          if (attr == 'nodeType') {
            continue;
          } else if (attr.toLocaleLowerCase() == 'innerhtml') {
            let resNode = this.objectToDom(nodeList[item][attr]);
            for (let nodeItem in resNode) {
              node.insertAdjacentElement('beforeend', resNode[nodeItem]);
            }
          } else if (attr.toLocaleLowerCase() == 'innertext') {
            node.insertAdjacentText('beforeend', nodeList[item][attr]);
          } else {
            node.setAttribute(attr, nodeList[item][attr]);
          }
        }
        buildNode[item] = node;
      }
    }
    return buildNode;
  }

  static loadFile (filename) {
    let previousNode = null;
    let refenrenceNode = null;
    let refenrenceType = filename.substring(filename.toLowerCase().lastIndexOf('.') + 1);

    // 判断需要引入文件类型并初始化Node
    switch (refenrenceType) {
      case 'css':
        previousNode = document.head.querySelectorAll('link');
        previousNode = previousNode.item(previousNode.lenth -1);
        refenrenceNode = document.createElement('link');
        refenrenceNode.rel = 'stylesheet';
        refenrenceNode.href = filename;
        break;

      case 'js':
        previousNode = document.head.querySelectorAll('script');
        previousNode = previousNode.item(previousNode.length -1);
        refenrenceNode = document.createElement('script');
        refenrenceNode.src = filename;
        break;

      default: 
        break;
    }

    previousNode.insertAdjacentElement('afterend', refenrenceNode);
  }

  /**
   * 深度克隆对象
   * 注意: 无法对Date、function、undefined类型数据生效
   * @param  {Object} obj 源对象
   * @return {Object}     新对象
   */
  static deepClone (obj) {
    return JSON.parse(JSON.stringify(obj));
  }

  /**
   * 进入全屏
   * @param  {[type]} element DOM
   */
  static launchFullscreen (element) {
    if (element.requestFullscreen)
      element.requestFullscreen();
    else if (element.mozRequestFullScreen)
      element.mozRequestFullScreen();
    else if (element.msRequestFullscreen)
      element.msRequestFullscreen();
    else if (element.webkitRequestFullscreen)
      element.webkitRequestFullScreen();
  }

  /**
   * 退出全屏
   */
  static exitFullscreen () {
    if (document.exitFullscreen)
     document.exitFullscreen();
    else if (document.msExitFullscreen)
      document.msExitFullscreen();
    else if (document.mozCancelFullScreen)
      document.mozCancelFullScreen();
    else if (document.webkitExitFullscreen)
      document.webkitExitFullscreen();
  }

  static getFullscreenNode () {
    return document.fullscreenElement || document.msFullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement || false;
  }
}