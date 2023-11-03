<?php
include("connection.php");
$msg="";
session_start();
ob_start();
//error_reporting(E_ALL);
//ob_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="script.js" defer></script>
    <title>Registration Form</title>
  </head>
  <body>
    <div class="container">
        <div class="title">Semester Registration</div>
        <!-- Progress bar -->
        <div class="progressbar">
            <div class="progress" id="progress"></div>
            
            <div class="progress-step progress-step-active"
                data-title="Basic Details">
            </div>
            <div class="progress-step" data-title="Choose Subject"></div>
            <div class="progress-step" data-title="Elective Subject"></div>
            <div class="progress-step" data-title="Backlog Subject "></div>
            <div class="progress-step" data-title="Upload Document"></div>
            <div class="progress-step" data-title="Transaction Details"></div>
        </div>
    <form action="#" class="form" method="post" enctype="multipart/form-data" onsubmit="return validation()">
        <!-- onsubmit="return validation()" -->
      <!-- Steps -->
      <div class="form-step form-step-active">
        <div class="title2">Basic Details</div>
        <div class="input-group">
            <label><span>*</span>Admission No(reg no.):</label>
            <input type="text"placeholder="Enter your Admission no."name="adm_no" id="adm_no" onchange="GetDetail(this.value)" onkeyup="GetDetail(this.value)" >
            <i class="fa fa-exclamation-circle"></i>
            <i class="fa fa-check-circle"></i>
            <span id="adm_nos"></span>
        </div>
        <div class="input-group">
            <label for="name">Name:</label>
            <input type="text" name="name" 
                    id="name" 
                    placeholder="Enter your name"
                    value="" readonly>
        </div>
        <div class="input-group">
            <label><span>*</span>Branch:</label>
                   <Select id="bran"name="bran" onchange="compSubject(this.value, sem.value );GetDetail(adm_no.value);mulSubject(this.value, sem.value);backlogSubject(this.value,sem.value)">
                        <option value="">Select Branch</option>
                        <option value="COMPUTER ENGINEERING">Computer Engineering</option>
                        <option value="CIVIL ENGINEERING">Civil Engineering</option>
                   </Select>
                   <span id="brans"></span>
        </div>
        <div class="input-group">
            <label><span>*</span>Category:</label>
                       <Select name="category"id="cat">
                            <option value="">CHOOSE COI/RC/NON-COI</option>
                            <option value="COI">COI</option>
                            <option value="RC">RC</option>
                            <option value="NON-COI">NON-COI</option>
                        </Select>
                        <span id="cats"></span>
        </div>
        <div class="input-group">
            <label><span>*</span>Semester:</label>
                       <Select id="sem"name="sem" onchange="compSubject(bran.value, this.value );GetDetail(adm_no.value);mulSubject(bran.value, this.value);backlogSubject(bran.value,this.value)" >
                            <option value="">Select Semester</option>
                            <option value="I">Sem-I</option>
                            <option value="II">Sem-II</option>
                            <option value="III">Sem-III</option>
                            <option value="IV">Sem-IV</option>
                            <option value="V">Sem-V</option>
                            <option value="VI">Sem-VI</option>
                            <option value="VII">Sem-VII</option>
                            <option value="VIII">Sem-VIII</option>
                            <option value="XO">PASSED-OUT ODD</option>
                            <option value="XE">PASSED-OUT EVEN</option>
                       </Select>
                       <span id="sems"></span>
        </div>
        <div class="input-group">
            <label><span>*</span>Year:</label>
            <input type="text"placeholder="Year"name="year" id="year" value="" readonly>
        </div>
        <div class="input-group">
            <label>Contact No:</label>
            <input type="text" name="mobile_no" 
                id="mobile_no" 
                placeholder='Contact No'
                value="" readonly>
        </div>
        <div class="input-group">
            <label><span>*</span>Email:</label>
            <input type="text"placeholder="Eg: xyz@gmail.com"name="email_id"style="text-transform:lowercase;"id="email">
            <span id="emails"></span>
        </div>
        <div class="input-group">
            <label><span>*</span>Date of Registration:</label>
            <input type="date" id="date" name="d_o_register">
        </div>
        <script>
            document.getElementById("date").valueAsDate=new Date();
        </script>
        <div class="btns-group">
            <!-- <a href="#" class="btn btn-next width-50 ml-auto">Next</a> -->
            <button type="button" class="btn btn-next1">Next</button>
            <script>
                window.scroll({
                    top: 2500,left: 0,behaviour:"smooth"
                });
                window.scrollBy({
                    top: 100,left: 0,behaviour:"smooth"
                });
                document.querySelector('.form-step').scrollIntoView({
                    behavior:'smooth'
                });
            </script>
        </div>
      </div>
      <div class="form-step" id="top">
        <div class="title2">Choose Subject</div>
        <div class="input-group">
                        <label>Subject Code(1):</label>
                        <input type="text" name="sbc1" 
                            id="sbc1" 
                            placeholder='NA'
                            value="" readonly>
                    </div>
                    <div class="input-group">
                        <label>Subject Name(1):</label>
                        <input type="text" name="sbn1" 
                            id="sbn1" 
                            placeholder='NA'
                            value="" readonly>
                    </div>
                    <div class="input-group">
                        <label>Subject Code(2):</label>
                        <input type="text" name="sbc2" 
                            id="sbc2" 
                            placeholder='NA'
                            value="" readonly>
                    </div>
                    <div class="input-group">
                        <label>Subject Name(2):</label>
                        <input type="text" name="sbn2" 
                            id="sbn2" 
                            placeholder='NA'
                            value="" readonly>
                    </div>
                
                    <div class="input-group">
                        <label>Subject Code(3):</label>
                        <input type="text" name="sbc3" 
                            id="sbc3" 
                            placeholder='NA'
                            value="" readonly>
                    </div>
                    <div class="input-group">
                        <label>Subject Name(3):</label>
                        <input type="text" name="sbn3" 
                            id="sbn3" 
                            placeholder='NA'
                            value="" readonly>
                    </div>
                
                    <div class="input-group">
                        <label>Subject Code(4):</label>
                        <input type="text" name="sbc4" 
                            id="sbc4" 
                            placeholder='NA'
                            value="" readonly>
                    </div>
                    <div class="input-group">
                        <label>Subject Name(4):</label>
                        <input type="text" name="sbn4" 
                            id="sbn4" 
                            placeholder='NA'
                            value="" readonly>
                    </div>
                
                    <div class="input-group">
                        <label>Subject Code(5):</label>
                        <input type="text" name="sbc5" 
                            id="sbc5" 
                            placeholder='NA'
                            value="" readonly>
                    </div>
                    <div class="input-group">
                        <label>Subject Name(5):</label>
                        <input type="text" name="sbn5" 
                            id="sbn5" 
                            placeholder='NA'
                            value="" readonly>
                    </div>    
                    <div class="input-group">
                    <label>Subject Code(6):</label>
                    <input type="text" name="sbc6" 
                        id="sbc6" 
                        placeholder='NA'
                        value="" readonly>
                    </div>  
                    <div class="input-group">
                    <label>Subject Name(6):</label>
                    <input type="text" name="sbn6" 
                        id="sbn6" 
                        placeholder='NA'
                        value="" readonly>
                    </div>
                    <div class="input-group">
                    <label>Subject Code(7):</label>
                    <input type="text" name="sbc7" 
                        id="sbc7" 
                        placeholder='NA'
                        value="" readonly>
                    </div>  
                    <div class="input-group">
                    <label>Subject Name(7):</label>
                    <input type="text" name="sbn7" 
                        id="sbn7" 
                        placeholder='NA'
                        value="" readonly>
                    </div>
                    <div class="input-group">
                    <label>Subject Code(8):</label>
                    <input type="text" name="sbc8" 
                        id="sbc8" 
                        placeholder='NA'
                        value="" readonly>
                    </div>  
                    <div class="input-group">
                    <label>Subject Name(8):</label>
                    <input type="text" name="sbn8" 
                        id="sbn8" 
                        placeholder='NA'
                        value="" readonly>
                    </div>
                    <div class="input-group">
                    <label>Subject Code(9):</label>
                    <input type="text" name="sbc9" 
                        id="sbc9" 
                        placeholder='NA'
                        value="" readonly>
                    </div>  
                    <div class="input-group">
                    <label>Subject Name(9):</label>
                    <input type="text" name="sbn9" 
                        id="sbn9" 
                        placeholder='NA'
                        value="" readonly>
                    </div>
                    <div class="input-group">
                    <label>Subject Code(10):</label>
                    <input type="text" name="sbc10" 
                        id="sbc10" 
                        placeholder='NA'
                        value="" readonly>
                    </div>  
                    <div class="input-group">
                    <label>Subject Name(10):</label>
                    <input type="text" name="sbn10" 
                        id="sbn10" 
                        placeholder='NA'
                        value="" readonly>
                    </div>     
        <div class="btns-group">
            <button type="button" class="btn btn-prev">Previous</button>
            <button type="button" class="btn btn-next">Next</button>
        </div>
      </div>
      <div class="form-step">
        <div class="title2">Elective Subject</div>
        <div class="input-group">
        <label><span>*</span>Subject Name(1):</label>
                <select name="mulsbn1"id="mulsbn1" onchange="setSubjectCode(this.value,'mulsbc1','mulsbn1')">
                    <option value="" >Choose Subject Name</option>
                </select>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(1):</label>
                <!--<select name="mulsbc1"id="mulsbc1">
                    <option value="">Choose Subject Code</option>
                    
                </select>--> 
                <input type="text" name="mulsbc1" 
                            id="mulsbc1" 
                            placeholder='Subject Code'
                            value="" readonly>
        </div>
        
        <div class="input-group">
        <label><span>*</span>Subject Name(2):</label>
                <select name="mulsbn2"id="mulsbn2" onchange="setSubjectCode(this.value,'mulsbc2','mulsbn2')">
                    <option value="">Choose Subject Name</option>
                </select>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(2):</label>
                <!--<select name="mulsbc2"id="mulsbc2">
                    <option value="">Choose Subject Code</option>
                    
                </select>--> 
                <input type="text" name="mulsbc2" 
                            id="mulsbc2" 
                            placeholder='Subject Code'
                            value="" readonly>
        </div>
        
        <div class="input-group">
        <label><span>*</span>Subject Name(3):</label>
                <select name="mulsbn3"id="mulsbn3" onchange="setSubjectCode(this.value,'mulsbc3','mulsbn3')">
                    <option value="">Choose Subject Name</option>
                </select>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(3):</label>
                <!--<select name="mulsbc3"id="mulsbc3">
                    <option value="">Choose Subject Code</option>
                </select> -->
                <input type="text" name="mulsbc3" 
                            id="mulsbc3" 
                            placeholder='Subject Code'
                            value="" readonly>
        </div>
        
        <div class="input-group">
        <label><span>*</span>Subject Name(4):</label>
                <select name="mulsbn4"id="mulsbn4" onchange="setSubjectCode(this.value,'mulsbc4','mulsbn4')">
                    <option value="">Choose Subject Name</option>
                </select> 
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(4):</label>
                <!--<select name="mulsbc4"id="mulsbc4">
                    <option value="">Choose Subject Code</option>
                </select> --> 
                <input type="text" name="mulsbc4" 
                            id="mulsbc4" 
                            placeholder='Subject Code'
                            value="" readonly>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Name(5):</label>
                <select name="mulsbn5"id="mulsbn5" onchange="setSubjectCode(this.value,'mulsbc5','mulsbn5')">
                    <option value="">Choose Subject Name</option>
                </select> 
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(5):</label>
                <!--<select name="mulsbc5"id="mulsbc5">
                    <option value="">Choose Subject Code</option>
                </select> --> 
                <input type="text" name="mulsbc5" 
                            id="mulsbc5" 
                            placeholder='Subject Code'
                            value="" readonly>
        </div>
        <div class="btns-group">
          <button type="button" class="btn btn-prev">Previous</button>
          <button type="button" class="btn btn-next">Next</button>
        </div>
      </div>
      <div class="form-step">
        <div class="title2">BackLog Subject</div>
        <div class="input-group">
        <label><span>*</span>Subject Name(1):</label>
                <select name="bsbn1"id="bsbn1" onchange="setBackSubjectCode(this.value,bran.value,'bsbc1','bsbn1','reason1')">
                    <option value="" >Choose Backlog Subject Name</option>
                </select>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(1):</label>
                <input type="text" name="bsbc1" 
                            id="bsbc1" 
                            placeholder='Backlog Subject Code'
                            value="" readonly>
        </div>
        <div class="input-group">
            <label><span>*</span>Reason(1):</label>
            <Select name="reason1" id ="reason1">
                <option value="">Reason</option>
                <option value="Detained(Attendance)">Detained(Attendance)</option>
                <option value="Internal Fail">Internal Fail</option>
                <option value="External Fail">External Fail</option>
            </Select>
        </div> 

        <div class="input-group">
        <label><span>*</span>Subject Name(2):</label>
                <select name="bsbn2"id="bsbn2" onchange="setBackSubjectCode(this.value,bran.value,'bsbc2','bsbn2','reason2')">
                    <option value="" >Choose Backlog Subject Name</option>
                </select>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(2):</label>
                <input type="text" name="bsbc2" 
                            id="bsbc2" 
                            placeholder='Backlog Subject Code'
                            value="" readonly>
        </div>
        <div class="input-group">
            <label><span>*</span>Reason(2):</label>
            <Select name="reason2" id ="reason2">
                <option value="">Reason</option>
                <option value="Detained(Attendance)">Detained(Attendance)</option>
                <option value="Internal Fail">Internal Fail</option>
                <option value="External Fail">External Fail</option>
            </Select>
        </div> 
        <div class="input-group">
        <label><span>*</span>Subject Name(3):</label>
                <select name="bsbn3"id="bsbn3" onchange="setBackSubjectCode(this.value,bran.value,'bsbc3','bsbn3','reason3')">
                    <option value="" >Choose Backlog Subject Name</option>
                </select>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(3):</label>
                <input type="text" name="bsbc3" 
                            id="bsbc3" 
                            placeholder='Backlog Subject Code'
                            value="" readonly>
        </div>
        <div class="input-group">
            <label><span>*</span>Reason(3):</label>
            <Select name="reason3" id ="reason3">
                <option value="">Reason</option>
                <option value="Detained(Attendance)">Detained(Attendance)</option>
                <option value="Internal Fail">Internal Fail</option>
                <option value="External Fail">External Fail</option>
            </Select>
        </div> 
        <div class="input-group">
        <label><span>*</span>Subject Name(4):</label>
                <select name="bsbn4"id="bsbn4" onchange="setBackSubjectCode(this.value,bran.value,'bsbc4','bsbn4','reason4')">
                    <option value="" >Choose Backlog Subject Name</option>
                </select>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(4):</label>
                <input type="text" name="bsbc4" 
                            id="bsbc4" 
                            placeholder='Backlog Subject Code'
                            value="" readonly>
        </div>
        <div class="input-group">
            <label><span>*</span>Reason(4):</label>
            <Select name="reason4" id ="reason4">
                <option value="">Reason</option>
                <option value="Detained(Attendance)">Detained(Attendance)</option>
                <option value="Internal Fail">Internal Fail</option>
                <option value="External Fail">External Fail</option>
            </Select>
        </div> 
        <div class="input-group">
        <label><span>*</span>Subject Name(5):</label>
                <select name="bsbn5"id="bsbn5" onchange="setBackSubjectCode(this.value,bran.value,'bsbc5','bsbn5','reason5')">
                    <option value="" >Choose Backlog Subject Name</option>
                </select>
        </div>
        
        <div class="input-group">
        <label><span>*</span>Subject Code(5):</label>
        <input type="text" name="bsbc5" 
            id="bsbc5" 
            placeholder='Backlog Subject Code'
            value="" readonly>
        </div>
        <div class="input-group">
            <label><span>*</span>Reason(5):</label>
            <Select name="reason5" id ="reason5">
                <option value="">Reason</option>
                <option value="Detained(Attendance)">Detained(Attendance)</option>
                <option value="Internal Fail">Internal Fail</option>
                <option value="External Fail">External Fail</option>
            </Select>
        </div>  
        <div class="input-group">
        <label><span>*</span>Subject Name(6):</label>
        <select name="bsbn6"id="bsbn6" onchange="setBackSubjectCode(this.value,bran.value,'bsbc6','bsbn6','reason6')">
            <option value="" >Choose Backlog Subject Name</option>
        </select>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(6):</label>
        <input type="text" name="bsbc6" 
            id="bsbc6" 
            placeholder='Backlog Subject Code'
            value="" readonly>
        </div>
        <div class="input-group">
            <label><span>*</span>Reason(6):</label>
            <Select name="reason6" id ="reason6">
                <option value="">Reason</option>
                <option value="Detained(Attendance)">Detained(Attendance)</option>
                <option value="Internal Fail">Internal Fail</option>
                <option value="External Fail">External Fail</option>
            </Select>
        </div> 
        <div class="input-group">
        <label><span>*</span>Subject Name(7):</label>
        <select name="bsbn7"id="bsbn7" onchange="setBackSubjectCode(this.value,bran.value,'bsbc7','bsbn7','reason7')">
            <option value="" >Choose Backlog Subject Name</option>
        </select>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(7):</label>
        <input type="text" name="bsbc7" 
            id="bsbc7" 
            placeholder='Backlog Subject Code'
            value="" readonly>
        </div>
        <div class="input-group">
            <label><span>*</span>Reason(7):</label>
            <Select name="reason7" id ="reason7">
                <option value="">Reason</option>
                <option value="Detained(Attendance)">Detained(Attendance)</option>
                <option value="Internal Fail">Internal Fail</option>
                <option value="External Fail">External Fail</option>
            </Select>
        </div> 
        <div class="input-group">
        <label><span>*</span>Subject Name(8):</label>
        <select name="bsbn8"id="bsbn8" onchange="setBackSubjectCode(this.value,bran.value,'bsbc8','bsbn8','reason8')">
            <option value="" >Choose Backlog Subject Name</option>
        </select>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(8):</label>
        <input type="text" name="bsbc8" 
            id="bsbc8" 
            placeholder='Backlog Subject Code'
            value="" readonly>
        </div>
        <div class="input-group">
            <label><span>*</span>Reason(8):</label>
            <Select name="reason8" id ="reason8">
                <option value="">Reason</option>
                <option value="Detained(Attendance)">Detained(Attendance)</option>
                <option value="Internal Fail">Internal Fail</option>
                <option value="External Fail">External Fail</option>
            </Select>
        </div> 
        <div class="input-group">
        <label><span>*</span>Subject Name(9):</label>
        <select name="bsbn9"id="bsbn9" onchange="setBackSubjectCode(this.value,bran.value,'bsbc9','bsbn9','reason9')">
            <option value="" >Choose Backlog Subject Name</option>
        </select>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(9):</label>
        <input type="text" name="bsbc9" 
            id="bsbc9" 
            placeholder='Backlog Subject Code'
            value="" readonly>
        </div>
        <div class="input-group">
            <label><span>*</span>Reason(9):</label>
            <Select name="reason9" id ="reason9">
                <option value="">Reason</option>
                <option value="Detained(Attendance)">Detained(Attendance)</option>
                <option value="Internal Fail">Internal Fail</option>
                <option value="External Fail">External Fail</option>
            </Select>
        </div> 
        <div class="input-group">
        <label><span>*</span>Subject Name(10):</label>
        <select name="bsbn10"id="bsbn10" onchange="setBackSubjectCode(this.value,bran.value,'bsbc10','bsbn10','reason10')">
            <option value="" >Choose Backlog Subject Name</option>
        </select>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(10):</label>
        <input type="text" name="bsbc10" 
            id="bsbc10" 
            placeholder='Backlog Subject Code'
            value="" readonly>
        </div>
        <div class="input-group">
            <label><span>*</span>Reason(10):</label>
            <Select name="reason10" id ="reason10">
                <option value="">Reason</option>
                <option value="Detained(Attendance)">Detained(Attendance)</option>
                <option value="Internal Fail">Internal Fail</option>
                <option value="External Fail">External Fail</option>
            </Select>
        </div> 
        <div class="input-group">
        <label><span>*</span>Subject Name(11):</label>
        <select name="bsbn11"id="bsbn11" onchange="setBackSubjectCode(this.value,bran.value,'bsbc11','bsbn11','reason11')">
            <option value="" >Choose Backlog Subject Name</option>
        </select>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(11):</label>
        <input type="text" name="bsbc11" 
            id="bsbc11" 
            placeholder='Backlog Subject Code'
            value="" readonly>
        </div>
        <div class="input-group">
            <label><span>*</span>Reason(11):</label>
            <Select name="reason11" id ="reason11">
                <option value="">Reason</option>
                <option value="Detained(Attendance)">Detained(Attendance)</option>
                <option value="Internal Fail">Internal Fail</option>
                <option value="External Fail">External Fail</option>
            </Select>
        </div> 
        <div class="input-group">
        <label><span>*</span>Subject Name(12):</label>
                <select name="bsbn12"id="bsbn12" onchange="setBackSubjectCode(this.value,bran.value,'bsbc12','bsbn12','reason12')">
                    <option value="" >Choose Backlog Subject Name</option>
                </select>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(12):</label>
        <input type="text" name="bsbc12" 
            id="bsbc12" 
            placeholder='Backlog Subject Code'
            value="" readonly>
        </div>
        <div class="input-group">
            <label><span>*</span>Reason(12):</label>
            <Select name="reason12" id ="reason12">
                <option value="">Reason</option>
                <option value="Detained(Attendance)">Detained(Attendance)</option>
                <option value="Internal Fail">Internal Fail</option>
                <option value="External Fail">External Fail</option>
            </Select>
        </div> 
        <div class="input-group">
        <label><span>*</span>Subject Name(13):</label>
                <select name="bsbn13"id="bsbn13" onchange="setBackSubjectCode(this.value,bran.value,'bsbc13','bsbn13','reason13')">
                    <option value="" >Choose Backlog Subject Name</option>
                </select>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(13):</label>
            <input type="text" name="bsbc13" 
            id="bsbc13" 
            placeholder='Backlog Subject Code'
            value="" readonly>
        </div>
        <div class="input-group">
            <label><span>*</span>Reason(13):</label>
            <Select name="reason13" id ="reason13">
                <option value="">Reason</option>
                <option value="Detained(Attendance)">Detained(Attendance)</option>
                <option value="Internal Fail">Internal Fail</option>
                <option value="External Fail">External Fail</option>
            </Select>
        </div> 
        <div class="input-group">
        <label><span>*</span>Subject Name(14):</label>
                <select name="bsbn14"id="bsbn14" onchange="setBackSubjectCode(this.value,bran.value,'bsbc14','bsbn14','reason14')">
                    <option value="" >Choose Backlog Subject Name</option>
                </select>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(14):</label>
        <input type="text" name="bsbc14" 
            id="bsbc14" 
            placeholder='Backlog Subject Code'
            value="" readonly>
        </div>
        <div class="input-group">
            <label><span>*</span>Reason(14):</label>
            <Select name="reason14" id ="reason14">
                <option value="">Reason</option>
                <option value="Detained(Attendance)">Detained(Attendance)</option>
                <option value="Internal Fail">Internal Fail</option>
                <option value="External Fail">External Fail</option>
            </Select>
        </div> 
        <div class="input-group">
        <label><span>*</span>Subject Name(15):</label>
                <select name="bsbn15"id="bsbn15" onchange="setBackSubjectCode(this.value,bran.value,'bsbc15','bsbn15','reason15')">
                    <option value="" >Choose Backlog Subject Name</option>
                </select>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(15):</label>
        <input type="text" name="bsbc15" 
            id="bsbc15" 
            placeholder='Backlog Subject Code'
            value="" readonly>
        </div>
        <div class="input-group">
            <label><span>*</span>Reason(15):</label>
            <Select name="reason15" id ="reason15">
                <option value="">Reason</option>
                <option value="Detained(Attendance)">Detained(Attendance)</option>
                <option value="Internal Fail">Internal Fail</option>
                <option value="External Fail">External Fail</option>
            </Select>
        </div> 

        <div class="input-group">
        <label><span>*</span>Subject Name(16):</label>
                <select name="bsbn16"id="bsbn16" onchange="setBackSubjectCode(this.value,bran.value,'bsbc16','bsbn16','reason16')">
                    <option value="" >Choose Backlog Subject Name</option>
                </select>
        </div>
        <div class="input-group">
        <label><span>*</span>Subject Code(16):</label>
        <input type="text" name="bsbc16" 
            id="bsbc16" 
            placeholder='Backlog Subject Code'
            value="" readonly>
        </div>
        <div class="input-group">
            <label><span>*</span>Reason(16):</label>
            <Select name="reason16" id ="reason16">
                <option value="">Reason</option>
                <option value="Detained(Attendance)">Detained(Attendance)</option>
                <option value="Internal Fail">Internal Fail</option>
                <option value="External Fail">External Fail</option>
            </Select>
        </div> 

        <div class="btns-group">
            <button type="button" class="btn btn-prev1">Previous</button>
            <button type="button" class="btn btn-next">Next</button>
        </div>
    </div>
    <div class="form-step doc-upload">
    <div class="title2">Upload Your Result</div>
        <div class="input-group">
            <div class="input-doc">
                <p><span>*Note</span> Make a PDF File of All the Previous Semester Results Available and Upload.</p>
                <input type="file" name="files[]" id="files" accept=".jpg,.jpeg,.png,.pdf,.docx" multiple hidden onchange="validation2()" >

                <label for="files">
                    <div class="file-upload fa fa-cloud-upload">
                    </div>                    
                    <p>Browse File to Upload</p>
                </label>
                </div>
                <div id="filewrapper">
                    <h3 class="uploaded">Uploaded Document</h3>
                    <!-- <div class="showfilebox">
                        <div class="left">   
                            <span class="filetype" style="color: #fff;">Pdf</span>
                            <h3>amrit.pdf</h3>
                        </div>  
                        <div class="right">
                            //<span id="remove"class="fa fa-times-circle-o"></span> 
                            <span>&#215;</span>
                        </div> 
                    </div> -->
                
                    <h3 id="selectedFiles" style="color: #0c1130;"></h3>
              </div>  
              <span id="uploads"></span>  
        </div>
        <div class="btns-group">
            <button type="button" class="btn btn-prev">Previous</button>
            <button type="button" class="btn btn-next2">Next</button>
        </div>
      </div>

      <div class="form-step">
        <div class="title2">Transactin Details</div>
        <div class="input-group">
            <label><span>*</span>Fee Transaction Details:</label>
            <input type="text"placeholder="Enter Transaction No. " id="tran"name="transaction_det">
            <span id="trans"></span>
        </div>
        <div class="btns-group">
            <button type="button" class="btn btn-prev">Previous</button>
            <button type="submit"name="submit"class="btn-next3"onclick="return validation3()">Submit</button>
           
        </div>
      </div>
    </form>
</div>

<script src="script1.js"></script>
<?php
if (isset($_POST["submit"])) {
    $nam = $_POST['name'];
    $anm = $_POST['adm_no'];
    $_SESSION['adm_no'] = $_POST['adm_no'];
    $_SESSION['sem'] = $_POST['sem'];
    $bran = $_POST['bran'];
    $cat = $_POST['category'];
    $sem = $_POST['sem'];
    $year = $_POST['year'];
    $cnum = $_POST['mobile_no'];
    $ema = $_POST['email_id'];
    $dre = $_POST['d_o_register'];
    $sc1 = $_POST['sbc1'];
    $sn1 = $_POST['sbn1'];
    $sc2 = $_POST['sbc2'];
    $sn2 = $_POST['sbn2'];
    $sc3 = $_POST['sbc3'];
    $sn3 = $_POST['sbn3'];
    $sc4 = $_POST['sbc4'];
    $sn4 = $_POST['sbn4'];
    $sc5 = $_POST['sbc5'];
    $sn5 = $_POST['sbn5'];
    $sc6 = $_POST['sbc6'];
    $sn6 = $_POST['sbn6'];
    $sc7 = $_POST['sbc7'];
    $sn7 = $_POST['sbn7'];
    $sc8 = $_POST['sbc8'];
    $sn8 = $_POST['sbn8'];
    $sc9 = $_POST['sbc9'];
    $sn9 = $_POST['sbn9'];
    $sc10 = $_POST['sbc10'];
    $sn10 = $_POST['sbn10'];
    $mulsc1 = $_POST['mulsbc1'];
    $mulsn1 = $_POST['mulsbn1'];
    $mulsc2 = $_POST['mulsbc2'];
    $mulsn2 = $_POST['mulsbn2'];
    $mulsc3 = $_POST['mulsbc3'];
    $mulsn3 = $_POST['mulsbn3'];
    $mulsc4 = $_POST['mulsbc4'];
    $mulsn4 = $_POST['mulsbn4'];
    $mulsc5 = $_POST['mulsbc5'];
    $mulsn5 = $_POST['mulsbn5'];
    $bsbc1=$_POST['bsbc1'];
    $bsbn1=$_POST['bsbn1'];
    $res1=$_POST['reason1'];
    $bsbc2=$_POST['bsbc2'];
    $bsbn2=$_POST['bsbn2'];
    $res2=$_POST['reason2'];
    $bsbc3=$_POST['bsbc3'];
    $bsbn3=$_POST['bsbn3'];
    $res3=$_POST['reason3'];
    $bsbc4=$_POST['bsbc4'];
    $bsbn4=$_POST['bsbn4'];
    $res4=$_POST['reason4'];
    $bsbc5=$_POST['bsbc5'];
    $bsbn5=$_POST['bsbn5'];
    $res5=$_POST['reason5'];
    $bsbc6=$_POST['bsbc6'];
    $bsbn6=$_POST['bsbn6'];
    $res6=$_POST['reason6'];
    $bsbc7=$_POST['bsbc7'];
    $bsbn7=$_POST['bsbn7'];
    $res7=$_POST['reason7'];
    $bsbc8=$_POST['bsbc8'];
    $bsbn8=$_POST['bsbn8'];
    $res8=$_POST['reason8'];
    $bsbc9=$_POST['bsbc9'];
    $bsbn9=$_POST['bsbn9'];
    $res9=$_POST['reason9'];
    $bsbc10=$_POST['bsbc10'];
    $bsbn10=$_POST['bsbn10'];
    $res10=$_POST['reason10'];
    $bsbc11=$_POST['bsbc11'];
    $bsbn11=$_POST['bsbn11'];
    $res11=$_POST['reason11'];
    $bsbc12=$_POST['bsbc12'];
    $bsbn12=$_POST['bsbn12'];
    $res12=$_POST['reason12'];
    $bsbc13=$_POST['bsbc13'];
    $bsbn13=$_POST['bsbn13'];
    $res13=$_POST['reason13'];
    $bsbc14=$_POST['bsbc14'];
    $bsbn14=$_POST['bsbn14'];
    $res14=$_POST['reason14'];
    $bsbc15=$_POST['bsbc15'];
    $bsbn15=$_POST['bsbn15'];
    $res15=$_POST['reason15'];
    $bsbc16=$_POST['bsbc16'];
    $bsbn16=$_POST['bsbn16'];
    $res16=$_POST['reason16'];
    $tid = $_POST['transaction_det'];


    $coiCount=0;
    $noncoiCount=0;
    $rcCount=0;

    if ($cat == 'COI') { 
        $coiCount++;
    }else if ($cat == 'NON-COI') {
        $noncoiCount++;
    }else if ($cat == 'RC') {
        $rcCount++;
    }

    $c2query = "SELECT  * FROM `sem_registration` WHERE `adm_no`= '$anm'";
    $query2 = mysqli_query($conn, $c2query);
    while ($result = mysqli_fetch_assoc($query2)) {
        if ($result['category'] == 'COI') { 
            $coiCount++;
        }else if ($result['category'] == 'NON-COI') {
            $noncoiCount++;
        }else if ($result['category'] == 'RC') {
            $rcCount++;
        }
    }

    $c1query = "SELECT  * FROM `student_registration` WHERE `adm_no`= '$anm'";
    $query1 = mysqli_query($conn, $c1query);
    while ($result = mysqli_fetch_assoc($query1)) {

        if ($result['cat_coi_non_rc'] == 'COI') { 
            $coiCount++;
        }else if ($result['cat_coi_non_rc'] == 'NON-COI') {
            $noncoiCount++;
        }else if ($result['cat_coi_non_rc'] == 'RC') {
            $rcCount++;
        }

        if($coiCount > $noncoiCount && $coiCount>$rcCount){
            $c_cat = 'COI';
        }else if($noncoiCount > $coiCount && $noncoiCount>$rcCount){
            $c_cat = 'NON-COI';
        }else if($rcCount > $coiCount && $rcCount>$noncoiCount){
            $c_cat = 'RC';
        }else{
            $c_cat = $result['cat_coi_non_rc'];
        }
    }

    

    

    $query = "INSERT INTO `sem_registration`( `name`, `adm_no`, `branch`, `category`,`c_category`, `sem`, `year`,
    `cont_num`, `email_id`, `d_o_register`, `subjectcode1`, `subjectname1`, `subjectcode2`, `subjectname2`, 
    `subjectcode3`, `subjectname3`, `subjectcode4`, `subjectname4`, `subjectcode5`, `subjectname5`, `subjectcode6`,
    `subjectname6`, `subjectcode7`, `subjectname7`, `subjectcode8`, `subjectname8`, `subjectcode9`, 
    `subjectname9`,`subjectcode10`, `subjectname10`,`mulsubjectcode1`,`mulsubjectname1`,`mulsubjectcode2`,`mulsubjectname2`,
    `mulsubjectcode3`,`mulsubjectname3`,`mulsubjectcode4`,`mulsubjectname4`,`mulsubjectcode5`,`mulsubjectname5`,`bsubjectcode1`,`bsubjectname1`,`reason1`,`bsubjectcode2`,
    `bsubjectname2`,`reason2`,`bsubjectcode3`,`bsubjectname3`,`reason3`,`bsubjectcode4`,`bsubjectname4`,`reason4`,`bsubjectcode5`,`bsubjectname5`,`reason5`,
    `bsubjectcode6`,`bsubjectname6`,`reason6`,`bsubjectcode7`,`bsubjectname7`,`reason7`,`bsubjectcode8`,`bsubjectname8`,`reason8`,`bsubjectcode9`,
    `bsubjectname9`,`reason9`,`bsubjectcode10`,`bsubjectname10`,`reason10`,`bsubjectcode11`,`bsubjectname11`,`reason11`,`bsubjectcode12`,`bsubjectname12`,`reason12`,
    `bsubjectcode13`,`bsubjectname13`,`reason13`,`bsubjectcode14`,`bsubjectname14`,`reason14`,`bsubjectcode15`,`bsubjectname15`,`reason15`,`bsubjectcode16`,`bsubjectname16`,`reason16`, `transaction_det`)
    SELECT upper('$nam'),upper('$anm'),upper('$bran'),
    upper('$cat'),upper('$c_cat'),upper('$sem'),upper('$year'),upper('$cnum'),'$ema',upper('$dre'),upper('$sc1'),upper('$sn1'),
    upper('$sc2'),upper('$sn2'),upper('$sc3'),upper('$sn3'),upper('$sc4'),upper('$sn4'),upper('$sc5'),upper('$sn5'),
    upper('$sc6'),upper('$sn6'),upper('$sc7'),upper('$sn7'),upper('$sc8'),upper('$sn8'),upper('$sc9'),upper('$sn9'),
    upper('$sc10'),upper('$sn10'),upper('$mulsc1'),upper('$mulsn1'),upper('$mulsc2'),upper('$mulsn2'),upper('$mulsc3'),
    upper('$mulsn3'),upper('$mulsc4'),upper('$mulsn4'),upper('$mulsc5'),upper('$mulsn5'),upper('$bsbc1'),upper('$bsbn1'),upper('$res1'),upper('$bsbc2'),upper('$bsbn2'),upper('$res2'),
    upper('$bsbc3'),upper('$bsbn3'),upper('$res3'),upper('$bsbc4'),upper('$bsbn4'),upper('$res4'),upper('$bsbc5'),upper('$bsbn5'),upper('$res5'),upper('$bsbc6'),
    upper('$bsbn6'),upper('$res6'),upper('$bsbc7'),upper('$bsbn7'),upper('$res7'),upper('$bsbc8'),upper('$bsbn8'),upper('$res8'),upper('$bsbc9'),upper('$bsbn9'),upper('$res9'),
    upper('$bsbc10'),upper('$bsbn10'),upper('$res10'),upper('$bsbc11'),upper('$bsbn11'),upper('$res11'),upper('$bsbc12'),upper('$bsbn12'),upper('$res12'),upper('$bsbc13'),
    upper('$bsbn13'),upper('$res13'),upper('$bsbc14'),upper('$bsbn14'),upper('$res14'),upper('$bsbc15'),upper('$bsbn15'),upper('$res15'),upper('$bsbc16'),upper('$bsbn16'),upper('$res16'),upper('$tid')
    WHERE NOT EXISTS (SELECT `sem` FROM `sem_registration` WHERE `sem` = '$sem' AND `adm_no` = '$anm')";
    $data1 = mysqli_query($conn, $query);

    $upsem = "UPDATE `student_registration` SET `curr_sem`='$sem' WHERE adm_no = '$anm'";
    $upque=mysqli_query($conn, $upsem);

    $upsem1 = "UPDATE `marksheet_record` SET `curr_sem`='$sem' WHERE adm_no = '$anm'";
    $upque1=mysqli_query($conn, $upsem1);

    
        //if ($result['cat_coi_non_rc'] == $cat) {
            // $updatequery = "UPDATE `sem_registration` SET `adm_no` = upper('$anm'), `c_category` = upper('$cat') 
            // WHERE `adm_no` = '$anm' AND d_o_register = '$dre'";
            // $data2 = mysqli_query($conn, $updatequery);
        //}
    


    // $targetDir = "results/";
    // $targetFile = $targetDir . basename($_FILES["pdfFile"]["name"][0]);
    // $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // if(($fileType !="pdf" && $fileType !="doc" && $fileType !="docx") || $_FILES["pdfFile"]["size"][0]>2000000){
    //     echo"Only pdf file less than 2MB are allowed to be uploaded.";
    // }else{
        
    //     if(move_uploaded_file($_FILES["pdfFile"]["tmp_name"][0], $targetFile))
    //     {
    //         $filename = $_FILES["pdfFile"]["name"][0];
    //         $folder_path=$targetDir;
    //         $time_stamp=date("Y");
    //         $qulala = "INSERT INTO `results_upload`(`adm_no`, `name`, `sem`, `branch`, `filename`, `folder_path`, `time_stamp`) VALUES (upper('$anm'),upper('$nam'),'$sem','$bran','$filename','$folder_path','$time_stamp')";     
            
    //         $data33 = mysqli_query($conn, $qulala);
    //     }
    // }


    $targetDir = "results/"; 
    $allowTypes = array("jpg","jpeg","png","pdf","docx"); 
    
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $new_value = str_replace("'","\'", $_FILES['files']['name'][$key]);
            $fileName = basename($new_value); 
            $targetFilePath = $targetDir . $fileName; 
            
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    $insertValuesSQL .= "('$anm','$nam','$sem','$bran','".$fileName."','$targetDir', NOW()),"; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
        
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            // Insert image file name into database 
            $insert = $conn->query("INSERT INTO `results_upload`( `adm_no`, `name`, `sem`, `branch`, `filename`, `folder_path`, `time_stamp`) VALUES $insertValuesSQL"); 
            if($insert){ 
                $statusMsg = "Files are uploaded successfully.".$errorMsg; 
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
            $statusMsg = "Upload failed! ".$errorMsg; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
}

if ($anm != '' && isset($_POST["submit"])) {
    header("Location: http://localhost/test/Mini/s_registration_table.php");
}

?>

  </body>
</html>