package test

import (
	"design/decorator"
	"fmt"
	"testing"
)

func TestDecorator(t *testing.T) {
	pizza1 := &decorator.VeggeMania{}
	fmt.Println(pizza1.GetPrice())
	//加土豆
	pizza2 := &decorator.TomatoTopping{
		Pizza: pizza1,
	}
	//加起司
	pizza3 := &decorator.TomatoTopping{
		Pizza: pizza2,
	}
	fmt.Println(pizza3.GetPrice())
}
