<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Hospital class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 관리자>페이지설정>HOSPITAL관리 controller 입니다.
 */
class Hospital extends CB_Controller
{

	/**
	 * 관리자 페이지 상의 현재 디렉토리입니다
	 * 페이지 이동시 필요한 정보입니다
	 */
	public $pagedir = 'page/hospital';

	/**
	 * 모델을 로딩합니다
	 */
	protected $models = array('Hospital', 'Hospital_group');

	/**
	 * 이 컨트롤러의 메인 모델 이름입니다
	 */
	protected $modelname = 'Hospital_model';

	/**
	 * 헬퍼를 로딩합니다
	 */
	protected $helpers = array('form', 'array', 'dhtml_editor');

	function __construct()
	{
		parent::__construct();

		/**
		 * 라이브러리를 로딩합니다
		 */
		$this->load->library(array('pagination', 'querystring'));
	}

	/**
	 * 목록을 가져오는 메소드입니다
	 */
	public function index()
	{

		// 이벤트 라이브러리를 로딩합니다
		$eventname = 'event_main_page_hospital_index';
		$this->load->event($eventname);

		$view = array();
		$view['view'] = array();

		// 이벤트가 존재하면 실행합니다
		$view['view']['event']['before'] = Events::trigger('before', $eventname);

		/**
		 * 페이지에 숫자가 아닌 문자가 입력되거나 1보다 작은 숫자가 입력되면 에러 페이지를 보여줍니다.
		 */
		$param =& $this->querystring;
		$page = (((int) $this->input->get('page')) > 0) ? ((int) $this->input->get('page')) : 1;
		$view['view']['sort'] = array(
			'hpt_id' => $param->sort('hpt_id', 'asc'),
			'hpt_title' => $param->sort('hpt_title', 'asc'),
			'hpt_order' => $param->sort('hpt_order', 'asc'),
			'hpt_datetime' => $param->sort('hpt_datetime', 'asc'),
		);
		$findex = $this->input->get('findex', null, 'hpt_order');
		$forder = $this->input->get('forder', null, 'asc');
		$sfield = $this->input->get('sfield', null, '');
		$skeyword = $this->input->get('skeyword', null, '');
		$hgr_id = $this->input->get('hgr_id', null, '');

		$per_page = admin_listnum();
		$offset = ($page - 1) * $per_page;

		$where = array();
		if ($hgr_id) {
			$where = array('hgr_id' => $hgr_id);
		}

		/**
		 * 게시판 목록에 필요한 정보를 가져옵니다.
		 */
		$this->{$this->modelname}->allow_search_field = array('hpt_id', 'hgr_id', 'hpt_title', 'hpt_addr_sub', 'hpt_addr', 'hpt_datetime', 'hpt.mem_id'); // 검색이 가능한 필드
		$this->{$this->modelname}->search_field_equal = array('hpt_id', 'hgr_id', 'hpt.mem_id'); // 검색중 like 가 아닌 = 검색을 하는 필드
		$this->{$this->modelname}->allow_order_field = array('hpt_id', 'hpt_title', 'hpt_order', 'hpt_datetime'); // 정렬이 가능한 필드
		$result = $this->{$this->modelname}
			->get_admin_list($per_page, $offset, $where, '', $findex, $forder, $sfield, $skeyword);
		if (element('list', $result)) {
			foreach (element('list', $result) as $key => $val) {
				$result['list'][$key]['display_name'] = display_username(
					element('mem_userid', $val),
					element('mem_nickname', $val),
					element('mem_icon', $val)
				);
				$result['list'][$key]['hospitalgroup'] = $this->Hospital_group_model->get_one(element('hgr_id', $val));
			}
		}

		$view['view']['data'] = $result;

		/**
		 * primary key 정보를 저장합니다
		 */
		$view['view']['primary_key'] = $this->{$this->modelname}->primary_key;

		/**
		 * 페이지네이션을 생성합니다
		 */
		$config['base_url'] = admin_url($this->pagedir) . '?' . $param->replace('page');
		$config['total_rows'] = $result['total_rows'];
		$config['per_page'] = $per_page;
		$this->pagination->initialize($config);
		$view['view']['paging'] = $this->pagination->create_links();
		$view['view']['page'] = $page;

		/**
		 * 쓰기 주소, 삭제 주소등 필요한 주소를 구합니다
		 */
		$search_option = array('hpt_title' => '병원명', 'hpt_addr_sub' => '지역명', 'hpt_addr' => '시도 구명', 'hpt_datetime' => '날짜');
		$view['view']['skeyword'] = ($sfield && array_key_exists($sfield, $search_option)) ? $skeyword : '';
		$view['view']['search_option'] = search_option($search_option, $sfield);
		// $view['view']['listall_url'] = admin_url('page/hospitalgroup');
		$view['view']['listall_url'] = admin_url('page/hospital');
		$view['view']['write_url'] = admin_url($this->pagedir . '/write?hgr_id=' . $hgr_id);
		$view['view']['list_delete_url'] = admin_url($this->pagedir . '/listdelete/?' . $param->output());

		// 이벤트가 존재하면 실행합니다
		$view['view']['event']['before_layout'] = Events::trigger('before_layout', $eventname);

		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		

		$layoutconfig = array('layout' => 'layout', 'skin' => 'index');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}

	/**
	 * 게시판 글쓰기 또는 수정 페이지를 가져오는 메소드입니다
	 */
	public function write($pid = 0)
	{
		// 이벤트 라이브러리를 로딩합니다
		$eventname = 'event_main_page_hospital_write';
		$this->load->event($eventname);

		$view = array();
		$view['view'] = array();

		// 이벤트가 존재하면 실행합니다
		$view['view']['event']['before'] = Events::trigger('before', $eventname);

		/**
		 * 프라이머리키에 숫자형이 입력되지 않으면 에러처리합니다
		 */
		if ($pid) {
			$pid = (int) $pid;
			if (empty($pid) OR $pid < 1) {
				show_404();
			}
		}

		$hgr_id = (int) $this->input->get('hgr_id');
		if (empty($hgr_id) OR $hgr_id < 1) {
			show_404();
		}
		$primary_key = $this->{$this->modelname}->primary_key;

		/**
		 * 수정 페이지일 경우 기존 데이터를 가져옵니다
		 */
		if ($pid) {
			$getdata = $this->{$this->modelname}->get_one($pid);
		}

		/**
		 * Validation 라이브러리를 가져옵니다
		 */
		$this->load->library('form_validation');

		/**
		 * 전송된 데이터의 유효성을 체크합니다
		 */
		$config = array(
			array(
				'field' => 'hgr_id',
				'label' => 'HOSPITAL그룹',
				'rules' => 'trim|required|numeric',
			),
			// array(
			// 	'field' => 'hpt_order',
			// 	'label' => '정렬순서',
			// 	'rules' => 'trim|required|numeric',
			// ),
			array(
				'field' => 'hpt_title',
				'label' => '병원명',
				'rules' => 'trim|required',
			),
			array(
				'field' => 'hpt_addr',
				'label' => '시도 구명',
				'rules' => 'trim|required',
			),			
		);

		$this->form_validation->set_rules($config);


		/**
		 * 유효성 검사를 하지 않는 경우, 또는 유효성 검사에 실패한 경우입니다.
		 * 즉 글쓰기나 수정 페이지를 보고 있는 경우입니다
		 */
		if ($this->form_validation->run() === false) {

			// 이벤트가 존재하면 실행합니다
			$view['view']['event']['formrunfalse'] = Events::trigger('formrunfalse', $eventname);

			if ($pid) {
				$view['view']['data'] = $getdata;
			}
			$view['view']['data']['hospitalgroup'] = $this->Hospital_group_model->get_one($hgr_id);

			/**
			 * primary key 정보를 저장합니다
			 */
			$view['view']['primary_key'] = $primary_key;

			// 이벤트가 존재하면 실행합니다
			$view['view']['event']['before_layout'] = Events::trigger('before_layout', $eventname);

			/**
			 * 어드민 레이아웃을 정의합니다
			 */
			$layoutconfig = array('layout' => 'layout', 'skin' => 'write');
			$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
			$this->data = $view;
			$this->layout = element('layout_skin_file', element('layout', $view));
			$this->view = element('view_skin_file', element('layout', $view));

		} else {
			/**
			 * 유효성 검사를 통과한 경우입니다.
			 * 즉 데이터의 insert 나 update 의 process 처리가 필요한 상황입니다
			 */

			// 이벤트가 존재하면 실행합니다
			$view['view']['event']['formruntrue'] = Events::trigger('formruntrue', $eventname);
			$hpt_order = $this->input->post('hpt_order') ? $this->input->post('hpt_order') : 1;
			
			

			$updatedata = array(
				'hgr_id' => $this->input->post('hgr_id', null, 0),
				'hpt_title' => $this->input->post('hpt_title', null, ''),
				'hpt_addr_sub' => $this->input->post('hpt_addr_sub', null, ''),
				'hpt_addr' => $this->input->post('hpt_addr', null, ''),
				'hpt_order' => $hpt_order,
				'hpt_display' => $this->input->post('hpt_display', null, ''),
			);

			/**
			 * 게시물을 수정하는 경우입니다
			 */
			if ($this->input->post($primary_key)) {
				$this->{$this->modelname}->update($this->input->post($primary_key), $updatedata);
				$this->session->set_flashdata(
					'message',
					'정상적으로 수정되었습니다'
				);
			} else {
				/**
				 * 게시물을 새로 입력하는 경우입니다
				 */
				$updatedata['hpt_datetime'] = cdate('Y-m-d H:i:s');
				$updatedata['hpt_ip'] = $this->input->ip_address();
				$updatedata['mem_id'] = $this->member->item('mem_id');
				$this->{$this->modelname}->insert($updatedata);
				$this->session->set_flashdata(
					'message',
					'정상적으로 입력되었습니다'
				);
			}

			// 이벤트가 존재하면 실행합니다
			Events::trigger('after', $eventname);

			/**
			 * 게시물의 신규입력 또는 수정작업이 끝난 후 목록 페이지로 이동합니다
			 */
			if ($this->input->post('returnurl')) {
				
				redirect(urldecode($this->input->post('returnurl')));
			}

			$param =& $this->querystring;
			$redirecturl = admin_url($this->pagedir . '?' . $param->output());
			redirect($redirecturl);
		}
	}

	/**
	 * 목록 페이지에서 선택삭제를 하는 경우 실행되는 메소드입니다
	 */
	public function listdelete()
	{
		// 이벤트 라이브러리를 로딩합니다
		$eventname = 'event_main_page_hospital_listdelete';
		$this->load->event($eventname);

		// 이벤트가 존재하면 실행합니다
		Events::trigger('before', $eventname);

		/**
		 * 체크한 게시물의 삭제를 실행합니다
		 */
		if ($this->input->post('chk') && is_array($this->input->post('chk'))) {
			foreach ($this->input->post('chk') as $val) {
				if ($val) {
					$this->{$this->modelname}->delete($val);
				}
			}
		}

		// 이벤트가 존재하면 실행합니다
		Events::trigger('after', $eventname);

		/**
		 * 삭제가 끝난 후 목록페이지로 이동합니다
		 */
		$this->session->set_flashdata(
			'message',
			'정상적으로 삭제되었습니다'
		);
		$param =& $this->querystring;
		$redirecturl = admin_url($this->pagedir . '?' . $param->output());
		redirect($redirecturl);
	}
}
