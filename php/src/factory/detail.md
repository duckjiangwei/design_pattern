## 工厂方法适应的场景
-  当你在编写代码的过程中， 如果无法预知对象确切类别及其依赖关系时
> 工厂方法将创建产品的代码与实际使用产品的代码分离， 从而能在不影响其他代码的情况下扩展产品创建部分代码。

> 例如， 如果需要向应用中添加一种新产品， 你只需要开发新的创建者子类， 然后重写其工厂方法即可。

- 如果你希望用户能扩展你软件库或框架的内部组件
- 如果你希望复用现有对象来节省系统资源， 而不是每次都重新创建对象
> 在处理大型资源密集型对象 （比如数据库连接、 文件系统和网络资源） 时， 你会经常碰到这种资源需求。

> 让我们思考复用现有对象的方法：
> 1. 首先， 你需要创建存储空间来存放所有已经创建的对象。
> 2. 当他人请求一个对象时， 程序将在对象池中搜索可用对象。
> 3. …然后将其返回给客户端代码。
> 4. 如果没有可用对象， 程序则创建一个新对象 （并将其添加到对象池中）。

> 这种方式代码太多了。工厂方法只需要换参数就好了。