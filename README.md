# webbandienthoaiphp
I, Phân chia công việc trong nhóm

	1. Trang admin
	*-----------------------------------------------------------------------------------*
	*	Công việc			*		Người thực hiện					 					*
	*-----------------------------------------------------------------------------------*
	* 						*	- Hoàng Xuân Quyết										*
	*  	Giao diện			*	- Trần Văn Nực 						 					*
	*						*	- Nguyễn Huy Hiếu 										*	
	*-----------------------------------------------------------------------------------*
	*	Module hoadon		*	- Nguyễn Huy Hiếu(show ds, tim kiem, hien thi)			*
	*	Module product		*	- Trần Văn Nực(show ds, them, sua, xoa, tim kiem)		*							
	*	Module user			*	- Nguyễn Xuân Quyết(show ds, them, sua, xoa, tim kiem)	*
	*	Module danhmuc		*	- Hoàng Huy Hiếu(show ds, them, sua, xoa)				*
	*						*	- Hoàng Xuân Quyet - 2 (doanh thu, sp ban ra)			*
	*	Module thongke		*	- Trần Văn Nực - 2 (tự nghĩ 2 cái)						*
	*						*	- Nguyễn Huy Hiếu - 1 (tự nghĩ 1 cái)					*
	*-----------------------------------------------------------------------------------*

	2. Trang bán hàng

	*-----------------------------------------------------------------------------------*
	*	Công việc			*		Người thực hiện					 					*
	*-----------------------------------------------------------------------------------*
	* 						*															*
	*  	Giao diện			*	- Lương Văn Chính 						 				*
	*						*					 										*	
	*-----------------------------------------------------------------------------------*
	*	Module dangnhap		*	- Nguyễn Hữu Quỳnh										*
	*	Module dangky		*	- Nguyễn Hữu Quỳnh										*							
	*	Module hienThiSp	*	- Nguyễn Hữu Quỳnh										*
	*	Module htspdanhmuc	*	- Nguyễn Hữu Quỳnh										*
	*	Modele chitietsp	*	- Lương Văn Chính										*
	*	Module giohang		*	- Lương Văn Chính										*
	*	Modele thanhtoan	*	- Lương Văn Chính										*
	*-----------------------------------------------------------------------------------*
II, Cấu trúc project

	- admin : chứa gioa diện và chức năng của nhân viên quản lý admin. Trong adim gồm:
		+ layouts : chứa các trang giao diện của trang quản lý (header.php, footer.php, menu.php, ...).
		+ modules : chứa các trang chức năng theo từng đối tượng.
	- layouts : chứa các trang giao diện của trang bán hàng.
	- lib : bao gồm DAO (Data access object) và Service, kết nối vs CSDL.
	- static :  chứa các css, js, html, thư viện liên quản.
	- modules : chứa trang chức năng của trang bán hàng.
	** Mọi người hoàn thành công việc theo phân chia, nộp k đúng yêu cầu hay muộn sẽ bị trừ điểm khi sét điểm bt.
	(Mọi người cố gắng - by ChinhDz)
