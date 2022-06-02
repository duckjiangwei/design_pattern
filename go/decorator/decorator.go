package decorator

//零件接口
type Pizza interface {
	GetPrice() int
}

//具体零件
type VeggeMania struct {
}

func (p *VeggeMania) GetPrice() int {
	return 15
}

//具体装饰1
type TomatoTopping struct {
	Pizza Pizza
}

func (c *TomatoTopping) GetPrice() int {
	pizzaPrice := c.Pizza.GetPrice()
	return pizzaPrice + 7
}

//具体装饰2
type CheeseTopping struct {
	Pizza Pizza
}

func (c *CheeseTopping) GetPrice() int {
	pizzaPrice := c.Pizza.GetPrice()
	return pizzaPrice + 10
}
