package strategy

import "fmt"

//策略接口
type evictionAlgo interface {
	evict(c *cache)
}

//具体策略

//策略1-先进先出
type Fifo struct {
}

func (l *Fifo) evict(c *cache) {
	fmt.Println("Evicting by fifo strtegy")
}

//策略2-置换策略
type Lru struct {
}

func (l *Lru) evict(c *cache) {
	fmt.Println("Evicting by lru strtegy")
}

//策略3
type Lfu struct {
}

func (l *Lfu) evict(c *cache) {
	fmt.Println("Evicting by lfu strtegy")
}

//背景
type cache struct {
	storage      map[string]string
	evictionAlgo evictionAlgo
	capacity     int //容量
	maxCapacity  int //最大容量
}

func InitCache(e evictionAlgo) *cache {
	storage := make(map[string]string)
	return &cache{
		storage:      storage,
		evictionAlgo: e,
		capacity:     0,
		maxCapacity:  2,
	}
}

func (c *cache) SetEvictionAlgo(e evictionAlgo) {
	c.evictionAlgo = e
}

func (c *cache) Add(key, value string) {
	if c.capacity == c.maxCapacity {
		//如果满了，就剔除一个
		c.evict()
	}
	c.capacity++
	c.storage[key] = value
}

func (c *cache) Get(key string) {
	delete(c.storage, key)
}

func (c *cache) evict() {
	c.evictionAlgo.evict(c)
	c.capacity--
}
