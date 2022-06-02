package test

import (
	"design/composite"
	"testing"
)

func TestComposite(t *testing.T) {
	//创建3个文件
	file1 := &composite.File{Name: "file1"}
	file2 := &composite.File{Name: "file2"}
	file3 := &composite.File{Name: "file3"}

	//创建一个目录
	folder1 := &composite.Folder{Name: "folder1"}
	//给目录加文件
	folder1.Add(file1)

	//再创建一个目录
	folder2 := &composite.Folder{Name: "folder2"}
	//给目录加文件
	folder2.Add(file2)
	folder2.Add(file3)
	//甚至可以把目录1加进来
	folder2.Add(folder1)

	folder2.Search("money")
}
