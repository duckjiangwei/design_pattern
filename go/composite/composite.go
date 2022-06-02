package composite

import "fmt"

//组件接口
type File struct {
	Name string
}

func (f *File) Search(keyword string) {
	fmt.Printf("Searching for keyword %s in file %s\n", keyword, f.Name)
}

func (f *File) GetName() string {
	return f.Name
}

//组合
type Folder struct {
	components []component
	Name       string
}

func (f *Folder) Search(keyword string) {
	fmt.Printf("Serching recursively for keyword %s in folder %s\n", keyword, f.Name)
	for _, composite := range f.components {
		composite.Search(keyword)
	}
}

func (f *Folder) Add(c component) {
	f.components = append(f.components, c)
}

//叶子
type component interface {
	Search(string)
}
