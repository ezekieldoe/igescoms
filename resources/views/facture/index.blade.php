@extends('layouts.backLayout.designadmin')
@section('content')
    @php($Module='Vente')
    @php($titre='Liste des factures')
    @php($titreRoute='facture')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">{{$titre}}</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a class="text-muted">{{$Module}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-muted">{{$titre}}</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->

            </div>
        </div>

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">

                <!--begin::Entry-->
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
            @endif

            <!--end::Notice-->
                <!--begin::Card-->
                <div class="card card-custom" style="width: 100%">
                    <div class="card-header">
                        <div class="card-title">
    											<span class="card-icon">
    												<i class="flaticon2-favourite text-primary"></i>
    											</span>
                            <h3 class="card-label">{{$titre}}</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Dropdown-->

                        <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-bordered table-hover table-checkable" id="kt_datatable"
                               style="margin-top: 13px !important">
                            <thead>
                            <tr>
                                <th>No fact. </th>
                                <th>Code fact. </th>
                                <th>No bl.</th>
                                <th>Code com.</th>
                                <th>Date de création</th>
                                <th>Client</th>
                                <th>Agence</th>
                                <th>Montant ttc</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($Resultat as $key => $res)
                                <tr>
                                    <td>{{ $res->num_fact }}</td>
                                    <td>{{ $res->code_fact }}</td>
                                    <td>{{ $res->num_bl }}</td>
                                    <td>{{ $res->code_comc }}</td>
                                    <td>{{ $res->date_cre_fact }}</td>
                                    <td>{{ $res->nom_cli . ' '. $res->prenom_cli}}</td>
                                    <td>{{ $res->lib_agce }}</td>
                                    <td>{{ number_format($res->prix_ttc_fact,'0',',','.') }}</td>
                                    <td align="center">
                                        <?php if($res->flag_fact == true and $res->annule_fact == false){ ?>
                                        <span  class="label label-lg font-weight-bold label-success label-inline"> Validé</span>
                                        <?php  }elseif($res->flag_fact == false and $res->annule_fact == false){?>
                                        <span class="label label-lg font-weight-bold label-default label-inline">En cours</span>
                                        <?php } elseif ( $res->annule_fact == true) { ?>
                                            <span class="label label-lg font-weight-bold label-danger label-inline">Annulé</span>
                                        <?php }  ?>
                                    </td>
                                    <td align="center">
                                        @can($titreRoute.'edit')
                                            <a href="{{ route($titreRoute.'edit',\App\Helpers\Crypt::UrlCrypt($res->num_fact)) }}"
                                               class="btn btn-warning btn-xs btn-clean btn-icon"
                                               title="Modifier"> <i class="la la-edit"></i> </a>
                                        @endcan

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->

    </div>

@endsection
