class History
{
  constructor()
  {
    this.uniqueNumberList = [];
    // this.setStroage(); //최초 실행 코드
    this.referesh();
  }

  referesh()
  {

    document.querySelector(`#historyPage .history .contentSection`).innerHTML = "";
    this.loadUniqueNumber();
    this.clearTabMenu();
    this.setYearList();

    this.setContentItem(this.getStroage());
    this.events();
  }

  setStroage() {
    let data =
    [
      {id:this.uniqueNumber(), date: "2021-01-19", contents: "부산 해외취업지원센터1, 일학습과정개발센터 신설"},
      {id:this.uniqueNumber(), date: "2021-02-19", contents: "부산 해외취업지원센터, 일학습과정개발센터 신설"},
      {id:this.uniqueNumber(), date: "2021-03-19", contents: "부산 해외취업지원센터, 일학습과정개발센터 신설"},
      {id:this.uniqueNumber(), date: "2021-05-19", contents: "부산 해외취업지원센터, 일학습과정개발센터 신설"},
      {id:this.uniqueNumber(), date: "2021-06-19", contents: "부산 해외취업지원센터, 일학습과정개발센터 신설"},
      {id:this.uniqueNumber(), date: "2021-07-19", contents: "부산 해외취업지원센터, 일학습과정개발센터 신설"},

      {id:this.uniqueNumber(), date: "2020-01-19", contents: "부산 해외취업지원센터3, 일학습과정개발센터 신설"},
      {id:this.uniqueNumber(), date: "2020-02-19", contents: "부산 해외취업지원센터, 일학습과정개발센터 신설"},
      {id:this.uniqueNumber(), date: "2020-03-19", contents: "부산 해외취업지원센터, 일학습과정개발센터 신설"},
      {id:this.uniqueNumber(), date: "2020-05-19", contents: "부산 해외취업지원센터, 일학습과정개발센터 신설"},
      {id:this.uniqueNumber(), date: "2020-06-19", contents: "부산 해외취업지원센터, 일학습과정개발센터 신설"},
      {id:this.uniqueNumber(), date: "2020-07-19", contents: "부산 해외취업지원센터, 일학습과정개발센터 신설"},
      
      {id:this.uniqueNumber(), date: "2019-01-19", contents: "부산 해외취업지원센터5, 일학습과정개발센터 신설"},
      {id:this.uniqueNumber(), date: "2019-02-19", contents: "부산 해외취업지원센터, 일학습과정개발센터 신설"},
      {id:this.uniqueNumber(), date: "2019-03-19", contents: "부산 해외취업지원센터, 일학습과정개발센터 신설"},
      {id:this.uniqueNumber(), date: "2019-05-19", contents: "부산 해외취업지원센터, 일학습과정개발센터 신설"},
      {id:this.uniqueNumber(), date: "2019-06-19", contents: "부산 해외취업지원센터, 일학습과정개발센터 신설"},
      {id:this.uniqueNumber(), date: "2019-07-19", contents: "부산 해외취업지원센터, 일학습과정개발센터 신설"},
    ]
    data = JSON.stringify(data);
    localStorage.setItem("history", data);
    localStorage.setItem("leastYear", this.getLastYear());
  }

  getStroage()
  {
    let data = localStorage.getItem("history")
    return JSON.parse(data);
  }
  stroageAddItem(date, contents)
  {
    let history_obj = this.getStroage(); 
    (history_obj).push(
      {date: date, contents: contents}
    );
    let data = JSON.stringify(history_obj);
    localStorage.setItem("history", data);
  }
  stroageEditItem(id, date, contents)
  {
    let history_obj = this.getStroage();
    history_obj.forEach((item, idx) => {
      if(item.id == id) {
        item.date = date;
        item.contents = contents
      }
    })

    let data = JSON.stringify(history_obj);
    localStorage.setItem("history", data);
  }
  stroageItemInfo(id)
  {
    let history_obj = this.getStroage();
    let returnValue = false;
    history_obj.forEach((item, idx) => {
      if(item.id == id) {
        returnValue = item;
      };
    });
    return returnValue;

  }
  stroageRemoveItem(id)
  {
    if(!confirm("연혁을 삭제하시겠습니까?")) return true;
    let history_obj = this.getStroage();
    history_obj.forEach((item, idx) => {
      if(item.id == id) {
        history_obj.splice(idx, 1);
        return true;
      };
    })

    let data = JSON.stringify(history_obj);
    localStorage.setItem("history", data);    
  }

  getLastYear()
  {
    if(localStorage.getItem("leastYear") != null) {
      return localStorage.getItem("leastYear");
    }
    let arr = this.getYearList();
    let max = 0;
    arr.forEach(item => {
      max < item ? max = item : max;
    })
    return max;
  }

  getYearList()
  {
    let arr = [];
    let history_obj = this.getStroage();
    history_obj.forEach(item => {
      let date = new Date(item.date);
      arr.push(date.getFullYear())
    });

    arr = [...(new Set(arr))];

    return arr; 
  }
  setYearList()
  {
    this.clearTabMenu();
    const yearList_stroage = this.getYearList();
    yearList_stroage.forEach( item => {
      this.addTabMenu(item);
      this.addDateFilterSection(item);
    });

  }

  clearTabMenu()
  {
    const tabMenu = document.querySelector("#historyPage .history .tab-menu");
    tabMenu.innerHTML = "";
  }
  addTabMenu(year)
  {
    const tabMenu = document.querySelector("#historyPage .history .tab-menu");
    tabMenu.innerHTML += `<span>${year}</span>`;
  }

  uniqueNumber()
  {
    const randomNumber = Math.floor(Math.random() * 50000);

    if((this.uniqueNumberList).some((x) => x == randomNumber)) {
      this.uniqueNumber();
    } else {
      (this.uniqueNumberList).push(randomNumber);
      this.saveUniqueNumber();
      return randomNumber
    }
  }
  removeUniqueNumber(num)
  {
    if(!(this.uniqueNumberList).some(randomNumber)) {
      (this.uniqueNumberList).pop(num);
      this.saveUniqueNumber();
      return true;
    }
    else 
      return false;
  }

  loadUniqueNumber()
  {
    const uniqueNumberList = localStorage.getItem("uniqueNumberList");
    if(uniqueNumberList != null) {
      this.uniqueNumberList = [];
      this.uniqueNumberList = JSON.parse(uniqueNumberList)
    };
  }
  saveUniqueNumber()
  {
    localStorage.setItem("uniqueNumberList", JSON.stringify(this.uniqueNumberList));
  }

  addDateFilterSection(date)
  {
    document.querySelector(`#historyPage .history .contentSection`).innerHTML += `
    <div class="datefilter date-${date}">
        <div class="item_list">
        </div>
        <div class="img">
            이미지
        </div>
    </div>
    `
  }

  setContentItem(data, sort = -1)
  {
    let sortData = data.sort((a,b) => {
      if(a.date > b.date) return 1 * sort;
      if(a.date < b.date) return -1 * sort;
    });
    sortData.forEach(child => {
      this.addContentItem(child);
    }); 
  }

  setDateLayout(date)
  {
    let month = date.getMonth() + 1;
    let days = date.getDate();
    return `${month >= 10 ? month : "0" + String(month)}. ${days >= 10 ? days : "0" + String(days)}`;
  }


  
  addContentItem({id, date = new Date(), contents})
  {
    date = new Date(date);
    const itemList = document.querySelector(`#historyPage .history .contentSection .datefilter.date-${date.getFullYear()} .item_list`);
    itemList.innerHTML += `
    <div data-id=${id}>
        <div class="date">${this.setDateLayout(date)}</div>
        <div class="text">${contents}</div>
        <div class="btnList">
            <button class="editButton">수정</button>
            <button class="removeButton">삭제</button>
        </div>
    </div>
    `;
  }
  
  // removeContentItem(dataId)
  // {
  //   const items = document.querySelectorAll("#historyPage .history .contentSection .datefilter.date-2023 .item_list > div");
  //   items.forEach(item => {
  //     if(item.dataset.id == dataId) item.remove();
  //   });
  // }

  lastClickYear()
  {
    localStorage.setItem("leastYear", "0000");
  }

  events()
  {
    const history = document.querySelector("#historyPage .history");
    const tabMenuList = history.querySelectorAll(".tab-menu > span");
    const contentSection = document.querySelector("#historyPage .history .contentSection");
    const datefilters = contentSection.querySelectorAll(`.datefilter`);
    const historyWindow = document.querySelector('.history_window');
    const confirmBtn = document.querySelector('.historyWindow_confirmBtn');


    tabMenuList.forEach(tabMenu => {
      const lastYearItem = contentSection.querySelector(`.date-${this.getLastYear()}`);
      if(tabMenu.innerHTML == this.getLastYear()) {
        localStorage.setItem("leastYear", `${this.getLastYear()}`);
        tabMenu.classList.add("active")
        lastYearItem.classList.add('active')
      }
    })

    document.onclick = (e) => {

      if((e.target.parentNode).classList.contains("tab-menu")) {
        tabMenuList.forEach(tabMenu => tabMenu.classList.remove("active"));
        datefilters.forEach(item => item.classList.remove('active'));
        const item = contentSection.querySelector(`.date-${e.target.innerHTML}`);

        localStorage.setItem("leastYear", `${e.target.innerHTML}`);
        e.target.classList.add('active');
        item.classList.add('active');
      }

      if(e.target.classList.contains("editButton")){
        const dataId = ((e.target.parentNode).parentNode).dataset.id
        let contents = historyWindow.children[0].children[1].children[1];
        let date = historyWindow.children[0].children[2].children[1];
        let confirmBtn = historyWindow.children[0].children[3];

        let stroageData = this.stroageItemInfo(dataId);

        
        historyWindow.style.display = "flex";
        
        confirmBtn.dataset.id = dataId;
        contents.value = stroageData.contents;
        date.value = stroageData.date;
      }

      if(e.target.classList.contains("removeButton")){
        this.stroageRemoveItem(((e.target.parentNode).parentNode).dataset.id);
      }

      if(e.target.classList.contains("historyWindow_confirmBtn")) {
        let contents = (e.target.parentNode.children[1].children[1]);
        let date = (e.target.parentNode.children[2].children[1]);

        this.stroageEditItem(e.target.dataset.id, date.value, contents.value);

        historyWindow.style.display = "none"; 
        confirmBtn.dataset.id = "none";
        // contents = stroageData.contents;
        // date = stroageData.date;
      }

      if(e.target.classList.contains("historyWindow_closeBtn")) {
        historyWindow.style.display = "none"; 
        confirmBtn.dataset.id = "none";
      }


      this.referesh();
    }
    
  };
}

class CulturalProperties 
{
  constructor()
  {
    this.contentItemArr = [];
    this.totalCnt = 0;
    this.pageStatus = document.querySelector(".pageStatus");

    this.referesh();
    // this.getInfo_All()
  }

  get defaultUrl()
  {
    return new URLSearchParams(window.location.search);
  }

  async referesh()
  {
    await this.getContentArr();
    await this.Pagination();
  }

  async getInfo_All()
  {
    return await fetch("/xml/nihList.xml")
            .then(res => res.text())
            .then(data => new DOMParser().parseFromString(data, 'application/xml'));
  }
  async getInfo_Item({ccbaKdcd, ccbaCtcd, ccbaAsno})
  {
    return await fetch(`/xml/detail/${ccbaKdcd}_${ccbaCtcd}_${ccbaAsno}.xml`)
      .then(res => res.text())
      .then(data => new DOMParser().parseFromString(data, 'application/xml'));

  }

  async getContentArr()
  {
    const data = await this.getInfo_All();  
    const items = data.getElementsByTagName("item");
    let totalCnt = 0; 
    [].forEach.call(items, (child, idx) => {
      let item = {};
      for(let i = 0; i < child.children.length; i++) {
        let temp = child.children.item(i);
        item[temp.nodeName] = temp.innerHTML;
      }
      (this.contentItemArr).push(item);
      totalCnt = idx;
    });

    this.totalCnt = totalCnt + 1;
    return true;
  }
  
  contentItem_obj(data)
  {
    const item = data[0];
    let info = {};
    for(let i = 0; i < item.children.length; i++) {
      let temp = item.children.item(i);
      info[temp.nodeName] = temp.innerHTML;
    }
    
    return info;
  }

  async Pagination()
  {
    let pageNum = this.defaultUrl.get("page") || 1;
    let maxPageNum = Math.ceil(this.totalCnt / 8);
    if(pageNum <= 0 || pageNum > maxPageNum) {
      alert("존재하지 않는 페이지입니다.");
      history.back();
      return;
    }
    this.pageStatus.innerHTML = `${pageNum}p / ${maxPageNum}p (총 ${this.totalCnt}건)`;
    let maxItemNum = pageNum * 8;

    let page = document.createElement("div");
    page.className = "page";

    if(maxItemNum - 1 > this.totalCnt) maxItemNum = this.totalCnt;

    for(let i = maxItemNum - 8; i <= maxItemNum - 1; i++) {
      let data = await this.getInfo_Item(this.contentItemArr[i]);
      let layout = this.contentItem_Layout(data);
      
      page.innerHTML += (layout);
    }
    this.setContentItem(page);
    this.setPageBtn(pageNum, maxPageNum)
  }

  setPageBtn(currentPage, maxPageNum)
  { 
    let minNum;
    let maxNum;
    if(currentPage <= 5) {
      minNum = 1
      maxNum = 5;
    } else {
      maxNum = Math.ceil(currentPage / 5) * 5;
      minNum = maxNum - 4;
    }

    let pageBar = document.querySelector(".page_bar");
    pageBar.innerHTML = "";
    
    let leftClass = "";
    if(!this.numberRange(1, maxPageNum, minNum - 1)) leftClass = "disabled";
    pageBar.innerHTML += `<a class="fa fas fa-chevron-left ${leftClass}" href="?page=${minNum - 1}"></a>`;

    for(let i = minNum; i <= maxNum; i++) 
      pageBar.innerHTML += `<a class="pageNum" href="?page=${i}">${i}</a>`;
    
    let rightClass = "";
    if(!this.numberRange(1, maxPageNum, maxNum + 1)) rightClass = "disabled";
    pageBar.innerHTML += `<a class="fa fas fa-chevron-right ${rightClass}" href="?page=${maxNum + 1}"></a>`;

  }

  numberRange(min, max, currentNum)
  {
    if( currentNum <= max && currentNum >= min) return true;
    else return false;
  }

  setContentItem(page)
  {
    let itemList = document.querySelector("#propertiesPage .album > .item_list");
    itemList.innerHTML = "";
    itemList.append(page);
  } 

  contentItem_Layout(data)
  {
    let resultInfo = this.contentItem_obj(data.getElementsByTagName("result"));
    let itemInfo = this.contentItem_obj(data.getElementsByTagName("item"));
    let {ccbaKdcd, ccbaCtcd, ccbaAsno} = resultInfo; 
    let {imageUrl, ccbaMnm1} = itemInfo;

    ccbaMnm1 = ccbaMnm1.replace(/<!\[CDATA\[/g, "").replace(/]\]>/g, "");

    let returnValue = `
      <div data-id="${ccbaKdcd}_${ccbaCtcd}_${ccbaAsno}">
        <img src="./xml/nihcImage/${imageUrl}" alt="${imageUrl == "" ? 'noImage' : ""}" class="${imageUrl == "" ? 'noImage' : ""}">
        <span>${ccbaMnm1}</span>
      </div>
    `;
    return returnValue;
  }
  
}

//ccbaCpno 로 상세 정보 구할 수 있음
if(location.pathname.startsWith("/history")) new History();
if(location.pathname.startsWith("/culturalProperties")) new CulturalProperties();