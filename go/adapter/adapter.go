package adapter

import "fmt"

type Client struct {
}

func (c *Client) InsertLightningConnectorIntoComputer(com computer) {
	fmt.Println("Client inserts Lightning connector into computer.")
	com.insertIntoLightningPort()
}

type computer interface {
	insertIntoLightningPort()
}

type Mac struct {
}

func (m *Mac) insertIntoLightningPort() {
	fmt.Println("Lightning connector is plugged into mac machine.")
}

type Windows struct{}

func (w *Windows) insertIntoUSBPort() {
	fmt.Println("USB connector is plugged into windows machine.")
}

//适配器
type WindowsAdapter struct {
	WindowMachine *Windows
}

func (w *WindowsAdapter) insertIntoLightningPort() {
	fmt.Println("Adapter converts Lightning signal to USB.")
	w.WindowMachine.insertIntoUSBPort()
}
