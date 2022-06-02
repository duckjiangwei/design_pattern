package factory

import "fmt"

//产品接口
type IGun interface {
	SetName(name string)
	SetPower(power int)
	GetName() string
	GetPower() int
}

//具体产品
type gun struct {
	name  string
	power int
}

func (g *gun) SetName(name string) {
	g.name = name
}

func (g *gun) GetName() string {
	return g.name
}

func (g *gun) SetPower(power int) {
	g.power = power
}

func (g *gun) GetPower() int {
	return g.power
}

//一个具体的产品
type ak47 struct {
	gun
}

func newAk47() IGun {
	return &ak47{
		gun: gun{
			name:  "AK47 gun",
			power: 4,
		},
	}
}

//一个具体的产品
type musket struct {
	gun
}

func newMusket() IGun {
	return &musket{
		gun: gun{
			name:  "Musket gun",
			power: 1,
		},
	}
}

//工厂
func GetGun(gunType string) (IGun, error) {
	if gunType == "ak47" {
		return newAk47(), nil
	}
	if gunType == "musket" {
		return newMusket(), nil
	}
	return nil, fmt.Errorf("Wrong gun type passed")
}
