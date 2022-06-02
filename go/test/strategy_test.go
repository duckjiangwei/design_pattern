package test

import (
	"design/strategy"
	"testing"
)

func TestStrategy(t *testing.T) {
	lfu := &strategy.Lfu{}
	cache := strategy.InitCache(lfu)

	cache.Add("a", "1")
	cache.Add("b", "2")
	cache.Add("c", "3")

	lru := &strategy.Lru{}
	//换了个策略
	cache.SetEvictionAlgo(lru)
	cache.Add("d", "4")

	//再次换策略
	fifo := &strategy.Fifo{}
	cache.SetEvictionAlgo(fifo)
	cache.Add("e", "5")
}
