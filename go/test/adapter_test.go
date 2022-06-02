package test

import (
	"design/adapter"
	"testing"
)

func TestAdapter(t *testing.T) {

	client := &adapter.Client{}
	mac := &adapter.Mac{}

	//mac能正常工作
	client.InsertLightningConnectorIntoComputer(mac)

	windowsMachine := &adapter.Windows{}
	//丢适配器里
	windowsAdapter := &adapter.WindowsAdapter{
		WindowMachine: windowsMachine,
	}
	//让 windows 工作
	client.InsertLightningConnectorIntoComputer(windowsAdapter)
}
