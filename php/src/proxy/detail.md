* 1.代理模式(Proxy Pattern) ：
 * 给某一个对象提供一个代理，并由代理对象控制对原对象的引用。
 *
 * 2. 场景
 * 在某些情况下，一个客户不想或者不能直接引用一个对 象，此时可以通过一个称之为“代理”的第三者来实现 间接引用。
 * 代理对象可以在客户端和目标对象之间起到 中介的作用，并且可以通过代理对象去掉客户不能看到 的内容和服务或者添加客户需要的额外服务。
 * 通过引入一个新的对象（如小图片和远程代理 对象）来实现对真实对象的操作或者将新的对 象作为真实对象的一个替身，这种实现机制即 为代理模式，
 * 通过引入代理对象来间接访问一 个对象，这就是代理模式的模式动机。
 *
 * 3.模式结构
 * Subject: 抽象主题角色
 * Proxy: 代理主题角色
 * RealSubject: 真实主题角色
 *
 * 4.优点
 * 4.1 代理模式能够协调调用者和被调用者，在一定程度上降低了系 统的耦合度。
 * 4.2 远程代理使得客户端可以访问在远程机器上的对象，远程机器 可能具有更好的计算性能与处理速度，可以快速响应并处理客户端请求。
 * 4.3 虚拟代理通过使用一个小对象来代表一个大对象，可以减少系 统资源的消耗，对系统进行优化并提高运行速度。
 * 4.4 保护代理可以控制对真实对象的使用权限。